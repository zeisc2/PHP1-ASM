<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('DBUtils.php');
session_start();

// unset( $_SESSION['cart']);

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Kiểm tra form và thêm sản phẩm vào giỏ hàng
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        // Thêm sản phẩm vào giỏ hàng
        $_SESSION['cart'][] = array(
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'quantity' => 1 // mac dinh la 1
        );

        // Chuyển hướng để tránh việc form được gửi lại khi refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'increase_quantity') {
        $id = $_POST['id'];

        // Tăng số lượng sản phẩm
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] === $id) {
                $item['quantity'] = isset($item['quantity']) ? $item['quantity'] + 1 : 1;
                break;
            }
        }

        // Chuyển hướng sau khi tăng số lượng
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'decrease_quantity') {
        $id = $_POST['id'];

        // Giảm số lượng sản phẩm, đảm bảo số lượng không nhỏ hơn 1
        foreach ($_SESSION['cart'] as $key => &$item) {
            if ($item['id'] === $id && isset($item['quantity']) && $item['quantity'] > 1) {
                $item['quantity']--;
                break;
            } else if ($item['id'] === $id && isset($item['quantity']) && $item['quantity'] <= 1) { 
                unset($_SESSION['cart'][$key]);  
                break;
            }
        }

        // Chuyển hướng sau khi giảm số lượng
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
 // tong tien tat ca san pham
 $totalCost = 0;
    foreach ($_SESSION['cart'] as $item) {
    $totalCost += $item['price'] * $item['quantity'];
    }