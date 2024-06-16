 <?php
  session_start();  
  ini_set("display_errors", "1");
  include_once('DBUtils.php');
  
  $dbHelper = new DBUtils();


  function isLoggedIn() {
      return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
  }

  if (!isLoggedIn()) {
      echo '<div class="alert alert-danger" role="alert">You must be logged in to checkout.</div>';
      echo '<a href="login.php" class="btn btn-primary">Login</a>';
      exit;
  }

  // Tổng tiền của sản phẩm
  $subtotal = 0;
  foreach ($_SESSION['cart'] as $item) {
      $subtotal += $item['price'] * $item['quantity'];
  }

  // ma giam gia
  $vouchers = [
    'GIAMGIA10%' => 0.1,  
    'GIAMGIA20' => 0.2,  
    'GIAMGIA30' => 0.3,  
    'GIAMGIA40' => 0.4,  
    'GIAMGIA50' => 0.5,  
    'GIAMGIA60' => 0.6,  
];

$subtotal = 0;
$discount = 0;

// Tính tổng phụ
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['voucher'])) {
    $voucher_code = strtoupper(trim($_POST['voucher']));
    if (array_key_exists($voucher_code, $vouchers)) {
        $discount = $subtotal * $vouchers[$voucher_code];
    } else {
        $discount = 0;
        echo "<script>alert('Invalid voucher code');</script>";
    }
}
$total = $subtotal - $discount;

// luu don hang

    $username = $_SESSION['username'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_SESSION['username']); 
    $address = htmlspecialchars($_POST['address']); 
    $email = htmlspecialchars($_POST['email']);
    $payment = htmlspecialchars($_POST['payment']);
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO orders (name, address, email, payment_method, total, user_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $address, $email, $payment, $total, $user_id]);  
    $order_id = $conn->lastInsertId();

    foreach ($_SESSION['cart'] as $item) {
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, price, quantity) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $item['name'], $item['price'], $item['quantity']]);
    }

  unset($_SESSION['cart']);
    unset($_SESSION['total']);

    header("Location: thankyou.php");
    exit(); 

     
}
