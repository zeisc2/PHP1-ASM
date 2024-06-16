<?php

include "./function/addproduct.php";


?>
<!DOCTYPE html>
<html>

<head>
    <title>Add product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style> 
    .text-danger {
        color: red;
    }
</style>
<body>
    <?php
    if (isset($_SESSION['success_message'])) {
        echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }
    ?>
    <a href="index.php" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Quay lai</a>
    <div class="container">
        <h2>Crud product</h2>
        <form action="addproduct.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
                <?php if (isset($errors['name'])) : ?>
                    <span class="text-danger"><?= $errors['name'] ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh</label>
                <input type="text" id="image" name="image" class="form-control" placeholder="Nhập đường dẫn ảnh">
               
                <?php if (isset($errors['image'])) : ?>
                    <span class="text-danger"><?= $errors['image'] ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" id="price" name="price" class="form-control" placeholder="Nhap giá">
                <?php if (isset($errors['price'])) : ?>
                    <span class="text-danger"><?= $errors['price'] ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Nhập số lượng">
                <?php if (isset($errors['quantity'])) : ?>
                    <span class="text-danger"><?= $errors['quantity'] ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Mieu ta</label>
                <input type="text" id="status" name="status" class="form-control" placeholder="Nhập  mieu ta">
                <?php if (isset($errors['status'])) : ?>
                    <span class="text-danger"><?= $errors['status'] ?></span>
                <?php endif; ?>
            </div>
            <button type="submit" name="action" value="create" class="btn btn-primary">Tạo</button>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product as $row) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><img src="<?= htmlspecialchars($row['image']) ?>" alt="image" width="120" /></td>
                            <td><?= $row['status'] ?></td>
                            <td>
                                <form method="post" action="addproduct.php">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="action" value="delete" class="btn btn-danger">Xóa</button>
                                    <a class="btn btn-info" href="update.php?id=<?= $row['id'] ?>">Sửa</a>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>