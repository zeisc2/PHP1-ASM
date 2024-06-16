<?php
ini_set('display_errors', '1');
include "./DBUtils.php";
$dbHelper = new DBUtils();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Update danh muc</title>
</head>
<body>
    <div class="container">
        <h2>Update Product</h2>
        <?php
      include "./function/update.php";
        ?>
            <form class="mt-3" method="POST" action="">
                <label for="id" class="form-label">Input id update</label>
                <input class="form-control" type="text" value="<?= $products[0]['id'] ?>"  placeholder="id can sua" name="id" readonly> <br><br>
                <label for="name" class="form-label">Input name update</label>
                <input class="form-control" type="text" value="<?= $products[0]['name'] ?>" placeholder="ten can sua" name="name" readonly><br><br>
                <label for="price" class="form-label">Input price update</label>
                <input class="form-control" type="text" value="<?= $products[0]['price'] ?>" placeholder="price can sua" name="price"><br><br><br>
                <label for="quantity" class="form-label">Input quantity update</label>
                <input class="form-control" type="text" value="<?= $products[0]['quantity'] ?>" placeholder="quantity can sua" name="quantity"><br><br>
                <label for="image" class="form-label">Input image update</label>
                <input class="form-control" type="text" value="<?= $products[0]['image'] ?>" placeholder="image can sua" name="image"><br><br>
                <label for="status" class="form-label">Input image status</label>
                <input class="form-control" type="text" value="<?= $products[0]['status']?>" placeholder="status can sua" name="status"><br><br>
                <button class="btn btn-success" name="action" value="update" type="submit">update </button> 
            </form>

    </div>

</body>

</html>