<?php
ini_set("display_errors", "1");
include "./DBUtils.php";
$dbHelper = new DBUtils();
$id = $_GET['id'];  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud user</title>
</head>
<body>
    
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
        <h2>Update user</h2>
        <?php
      include "./function/updateuser.php";
        ?>
            <form class="mt-3" method="POST" action="">
                <label for="username" class="form-label">Input username update</label>
                <input class="form-control" type="text" value="<?= $users[0]['username'] ?>"  placeholder="username can sua" name="username" readonly> <br><br>
               
                <label for="password" class="form-label">Input password update</label>
                <input class="form-control" type="text" value="<?= $users[0]['password'] ?>" placeholder="ten can sua" name="password"><br><br>
               
                <label for="email" class="form-label">Input email update</label>
                <input class="form-control" type="text" value="<?= $users[0]['email'] ?>" placeholder="email can sua" name="email"><br><br><br>
                 
                <button class="btn btn-success" name="action" value="update" type="submit">update </button> 
            </form>

    </div>

</body>

</html>
</body>
</html>