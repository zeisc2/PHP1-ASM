<?php
include "./function/checkout.php";




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        form.payment {
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($item['price'] ?? ''); ?></td>
                        <td>
                            <span><?php echo htmlspecialchars($item['quantity'] ?? ''); ?></span>
                        </td>
                        <td>
                            <img src="<?php echo htmlspecialchars($item['image'] ?? ''); ?>" alt="<?php echo htmlspecialchars($item['name'] ?? ''); ?>" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <?php
                            $item_total = $item['price'] * $item['quantity'];
                            echo number_format($item_total, 0, ',', '.') . ' VND';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>    

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="voucher">Voucher Code: </label>
                <input type="text" class="form-control" id="voucher" name="voucher">
            </div>
            <button type="submit" class="btn btn-primary">Apply Voucher</button>
        </form>

        <table style="margin-left: 800px;font-size: 16px">
            <tr>
                <th> Subtotal: </th>
                <td><?php echo number_format($subtotal, 0, ',', '.') . ' VND'; ?></td>
            </tr>
            <?php if ($discount > 0) : ?>
                <tr>
                    <th>Discount: </th>
                    <td>-<?php echo number_format($discount, 0, ',', '.') . ' VND'; ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <th>Total: </th>
                <td><?php echo number_format($total, 0, ',', '.') . ' VND'; ?></td>
            </tr>
        </table>
        <h1>Checkout form</h1>
        <form class="payment" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo htmlspecialchars($_SESSION['username'])?>"   readonly>
            </div>
            <div class="form-group">
                <label for="address">Address: </label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="payment">Payment methods: </label>
                <select class="form-control" id="payment" name="payment" required>
                    <option value="">Select a payment method</option>
                    <option value="cash">Cash</option>
                    <option value="credit-card">Credit card</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Payment</button>
            </div>
        </form>
    </div>
</body>
</html>
