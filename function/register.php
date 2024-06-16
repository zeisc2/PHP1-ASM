<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "./DBUtils.php";


$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'])) {
        if (empty($_POST['username'])) {
            $errors['username'] = 'username is required';
        }
    }
    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $errors['email'] = 'email is required';
        } else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "invalid email format";
            }
        }
    }
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'password is required';
        } else {
            if (strlen($_POST['password']) < 6) {
                $errors['password'] = "password must be at least 6 characters";
            }
        }
    }


    if (isset($conn) && count($errors) == 0) {
        // check ton tai username or email address
        $queryCheck = "select * from users where username= :username";
        $statement = $conn->prepare($queryCheck);
        $statement->execute([
            'username' => $_POST['username'],
        ]);
        $count = $statement->rowCount();
        if ($count > 0) {
            $errors['username'] = "username or email already exists";
        } else {
            //xu ly dang ky tai khoan
            $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
            $statement = $conn->prepare($query);
            $isCreated = $statement->execute([
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT), // Mã hóa mật khẩu trước khi lưu vào CSDL
                'email' => $_POST['email'],
            ]);
            
            if ($isCreated) {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        title: "Registration successful!",
                        text: "Welcome to our site",
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "login.php";
                        }
                    });
                </script>';
                exit();
            } else {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        title: "Registration failed!",
                        text: "Please try again later.",
                        icon: "error",
                    });
                </script>';
            }
        }
    }
}