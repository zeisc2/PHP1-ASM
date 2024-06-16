<?php
session_start();
include "./DBUtils.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];  

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT o.id as order_id, o.payment_method, o.total, o.email, o.address, o.name, oi.product_name, oi.quantity, oi.price, oi.order_date 
        FROM orders o 
        JOIN order_items oi ON o.id = oi.order_id 
        WHERE o.user_id = ? 
        ORDER BY oi.order_date DESC";
        
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

// Đóng kết nối
$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Order History</title>
</head>

<body>
<div class="container mt-5">
    <a href="index.php" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back To Home</a>
    <h2 class="mb-4">Order History</h2>
    <?php if (!empty($orders)) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Method</th>
                    <th>Total</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                        <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($order['price']); ?> VND</td>
                        <td><?php echo htmlspecialchars($order['payment_method']); ?></td>
                        <td><?php echo htmlspecialchars($order['total']); ?> VND</td>
                        <td><?php echo htmlspecialchars($order['email']); ?></td>
                        <td><?php echo htmlspecialchars($order['address']); ?></td>
                        <td><?php echo htmlspecialchars($order['name']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No orders found.</p>
    <?php } ?>
</div>
</body>

</html>
