<?php

include "./function/adduser.php";


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
        <h2>Crud user</h2>

        <form action="usermanager.php" method="post">
        
        <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Nhập tên username">
                <?php if (isset($errors['username'])) : ?>
                    <span class="text-danger"><?= $errors['username'] ?></span>
                <?php endif; ?>
           
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="nhap password">
               
                <?php if (isset($errors['password'])) : ?>
                    <span class="text-danger"><?= $errors['password'] ?></span>
                <?php endif; ?>
            </div>
          
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Nhap email">
                <?php if (isset($errors['email'])) : ?>
                    <span class="text-danger"><?= $errors['email'] ?></span>
                <?php endif; ?>
            </div>
          
            
            <button type="submit" name="action" value="create" class="btn btn-primary">Tạo</button>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>username</th>
                        <th>password</th>
                        <th>email</th>
                         
                        <th>Action</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $row) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <form method="post" action="usermanager.php">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="action" value="delete" class="btn btn-danger">Xóa</button>
                                    <a class="btn btn-info" href="updateuser.php?id=<?= $row['id'] ?>">Sửa</a>
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