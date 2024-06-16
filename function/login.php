<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('./database.php');
session_start();

 

function checkLogin($username, $password, $conn) {
    $query = "SELECT * FROM users WHERE username = :username";
    $statement = $conn->prepare($query);
    $statement->execute(['username' => $username]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username)) {
        $errors['username'] = "Username is required";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }

    if (empty($errors)) {
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $conn->prepare($query);
        $statement->execute(['username' => $username]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["username"] = $username;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;
            echo '<script>
            Swal.fire({
                title: "Login successful!",
                text: "Welcome to my site",
                icon: "success",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            });
            </script>';
        } else {
            echo '<script>Swal.fire("Error", "Invalid username or password", "error");</script>';
            return false;
        }
    }
}
