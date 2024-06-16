<?php 
//product 

session_start();
include "./DBUtils.php";

$dbHelper = new DBUtils();

// Xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $result = $dbHelper->delete('products', 'id=' . $id);
    $_SESSION['success_message'] = "Xóa sản phẩm thành công";
    header("Location: addproduct.php");  
    exit();
}

$products = $dbHelper->select("SELECT * FROM products");

 
// tim kiem 
 