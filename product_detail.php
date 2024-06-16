<?php
include "./function/product.php";
 

$conn = new mysqli($servername, $username, $password, $dbname);
 

// Lấy ID sản phẩm từ URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết sản phẩm
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

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
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        
        div.card{
            width: 30%;
            margin: 0 auto;
            text-align: center;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: #fff;
            border-radius: 10px;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <a href="index.php" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back To Home</a>
    <h2 class="mb-4">Chi tiết sản phẩm</h2>
    <?php if ($product) { ?>
        <div class="card">
            <img src="<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <div class="card-body">
                <h3 class="card-title font-weight-bold"><?php echo htmlspecialchars($product['name']); ?></h3>
                <p class="card-text text-danger"><?php echo "GIÁ SẢN PHẨM: " . htmlspecialchars($product['price']); ?> VND</p>
                <p class="card-text text-dark"><?php echo "MIÊU TẢ SẢN PHẨM: " . htmlspecialchars($product['status']); ?></p>
                <form method="post" action="cart.php">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                    <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                    <button type="submit" name="action" value="add" class="btn btn-outline-success btn-block">Buy</button>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <p>Không tìm thấy sản phẩm.</p>
    <?php } ?>
</div>
</body>

</html>
