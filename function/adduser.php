<?php
ini_set("display_errors", "1");
include_once('DBUtils.php');
$dbHelper = new DBUtils();
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Kiểm tra xem username có phải là admin không
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    echo "You do not have permission to access this page.";
    exit();
}

$users = $dbHelper->select("SELECT * FROM users");

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'create':
            // Kiểm tra các trường form
            if (empty($_POST['username'])) {
                $errors['username'] = "Please enter username";
            }
            if (empty($_POST['password'])) {
                $errors['password'] = "Please enter password";
            }
            if (empty($_POST['email'])) {
                $errors['email'] = "Please enter email";
            }
             
  
            // add

            if (count($errors) == 0) {
             
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
                $created = $dbHelper->insert(
                    "users",
                    array(
                        "username" => $_POST['username'],
                        "password" => $hashed_password, 
                        "email" => $_POST['email'], 
                    )
                );

                if ($created) {
                    $_SESSION['success_message'] = "User is created successfully";
                } else {
                    $_SESSION['error_message'] = "Something went wrong while creating the user";
                    
                }
                header("Location: usermanager.php");
                exit();
                
            }
            break;

        case 'delete':
            if (isset($_POST['id'])) {
                $id = $_POST["id"];
                $result = $dbHelper->delete('users', 'id=' . $id);
                if ($result) {
                    $_SESSION['success_message'] = "User is deleted successfully";
                } else {
                    $_SESSION['error_message'] = " Something went wrong while deleting the user";
                }
            }
            break;
    }
    $users = $dbHelper->select("SELECT * FROM users");
}
