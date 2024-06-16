<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] == 'update') {
                if (isset($_POST['username'])) {
                    if (empty($_POST['username'])) {
                        $errors['username'] = "Phải Nhập name";
                    } else {
                        $updated =  $dbHelper->update(
                            "users",
                            array(
                                'username' => $_POST['username'],   
                                'password' => $_POST['password'],
                                'email' => $_POST['email'],
                                 
                            ),
                            "id=$id"
                        );
                        header("Location: usermanager.php");
                    }
                }
            }
        }
        $dbHelper = new DBUtils();

        $users  = $dbHelper->select("select * from users where id=?", array($id));