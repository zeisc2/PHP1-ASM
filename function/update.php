<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] == 'update') {
                if (isset($_POST['name'])) {
                    if (empty($_POST['name'])) {
                        $errors['name'] = "Phải Nhập name";
                    } else {
                        $updated =  $dbHelper->update(
                            "products",
                            array(
                                'id' => $_POST['id'],
                                'name' => $_POST['name'],
                                'price' => $_POST['price'],
                                'quantity' => $_POST['quantity'],
                                'image' => $_POST['image'],
                                'status' => $_POST['status']
                            ),
                            "id=$id"
                        );
                        header("Location: addproduct.php");
                    }
                }
            }
        }
        $dbHelper = new DBUtils();

        $products  = $dbHelper->select("select * from products where id=?", array($id));