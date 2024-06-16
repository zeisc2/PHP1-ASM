<?php
 
function searchProducts($search) {
    include "./database.php";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Truy vấn cơ sở dữ liệu
    $sql = "SELECT * FROM products WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();

    return $products;
}
?>
