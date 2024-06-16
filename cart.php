<?php
    include "./function/cart.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Cart</h2>
        <?php if (!empty($_SESSION['cart'])) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>image</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $item) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['id'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($item['name'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($item['price'] ?? ''); ?></td>
                            <td>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id'] ?? ''); ?>">
                                    <button type="submit" name="action" value="decrease_quantity" class="btn btn-sm btn-secondary">-</button>
                                    <span><?php echo htmlspecialchars($item['quantity'] ?? ''); ?></span>
                                    <button type="submit" name="action" value="increase_quantity" class="btn btn-sm btn-secondary">+</button>
                                </form>
                            </td>
                            <td>
                                <img src="<?php echo htmlspecialchars($item['image'] ?? ''); ?>" alt="<?php echo htmlspecialchars($item['name'] ?? ''); ?>" style="width: 100px; height: auto;">
                            </td>
                            <td>
                                <?php
                                     $total = $item['price'] * $item['quantity'];
                                     echo number_format($total, 0, ',', '.') . ' VND';
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Total: </th> 
                                <td><?php echo number_format($totalCost, 0, ',', '.') . ' VND'; ?></td>
                               <td>
                               <button class="btn btn-primary">Update Cart</button>
                              <a href="checkout.php"> <button class="btn btn-primary">Checkout</button></a>
                               </td>
                            </tr>
                            <tr>
                                <td>
                            <form method="post" action="checkout.php">
                            <input type="hidden" name="id" value="<?php echo $products['id']; ?>">
                            <input type="hidden" name="name" value="<?php echo $products['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $products['price']; ?>">
                            <input type="hidden" name="image" value="<?php echo $products['image']; ?>">
                            <a href="index.php"><input type="button" class="btn btn-primary" value="Back"></a>
                        </form>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                          
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </tbody>
            </table>
        <?php else : ?>
            <p>Your shopping cart is empty.</p>
        <?php endif; ?>
    </div>
    <br><br><br>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>







 
 
 
 