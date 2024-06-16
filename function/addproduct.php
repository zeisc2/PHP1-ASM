
<?php
ini_set("display_errors", "1");
include_once('DBUtils.php');
$dbHelper = new DBUtils();
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Kiểm tra xem username có phải là admin không
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    echo "You do not have permission to access this page.";
    exit();
}

$product = $dbHelper->select("SELECT * FROM products");

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'create':
            // Kiểm tra các trường form
            if (empty($_POST['name'])) {
                $errors['name'] = "Please enter name";
            }
            if (empty($_POST['image'])) {
                $errors['image'] = "Please enter image";
            }
            if (empty($_POST['price'])) {
                $errors['price'] = "Please enter price";
            }
            if (empty($_POST['quantity'])) {
                $errors['quantity'] = "Please enter quantity";
            }
  
            // add

            if (count($errors) == 0) {
                $created = $dbHelper->insert(
                    "products",
                    array(
                        "name" => $_POST['name'],
                        "price" => $_POST['price'],
                        "quantity" => $_POST['quantity'],
                        "image" => $_POST['image'],
                        "status" => $_POST['status'],
                    )
                );
                if ($created) {
                    $_SESSION['success_message'] = "Sản phẩm đã được tạo thành công";
                } else {
                    $_SESSION['error_message'] = "Đã xảy ra lỗi khi tạo sản phẩm";
                    
                }
                header("Location: addproduct.php");
                exit();
                
            }
            break;

        case 'delete':
            if (isset($_POST['id'])) {
                $id = $_POST["id"];
                $result = $dbHelper->delete('products', 'id=' . $id);
                if ($result) {
                    $_SESSION['success_message'] = "Sản phẩm đã được xóa thành công";
                } else {
                    $_SESSION['error_message'] = "Đã xảy ra lỗi khi xóa sản phẩm";
                }
            }
            break;
    }
    $products = $dbHelper->select("SELECT * FROM products");
}
