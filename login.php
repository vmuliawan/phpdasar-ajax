<?php 
    session_start();
    if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }

    require 'fungsi.php';

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $result = mysqli_query($db,"SELECT * FROM user WHERE username = '$username'");

        // cek username
        if(mysqli_num_rows($result) === 1){

            // cek password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password,$row['password'])){
                // cek session
                $_SESSION["login"] = true;

                header('Location: index.php');
                exit;     
            }
        }
        // jika username/password salah
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman login</h1>

    <?php if(isset($error)) : ?>
        <h3 style="color: red;">Username/Password yang dimasukan salah!</h3>
        <?php endif;?>

    <form action="" method="post">
    <ul style="list-style: none;">
        <li>
            <label for="username">Username</label>
            <input type="text" placeholder="Username" name="username" id="username" autofocus autocomplete="off" required>
        </li>
        <li>
            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" id="password" required>
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
    </form>
</body>
</html>