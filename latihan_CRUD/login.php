<?php
session_start();

if ( isset($_SESSION ['login']) ) {
     header('Location: index.php');
     exit;
}

require 'functions.php';

if ( isset( $_POST ['login'] ) ) {
     $username = $_POST ['username'];
     $password = $_POST ['password'];
     $result = mysqli_query ( $conn, "SELECT * FROM users WHERE username = '$username' " );
     // cekusername
     if ( mysqli_num_rows ( $result ) === 1 ) {
          // cek password
          $row = mysqli_fetch_assoc ( $result );
          if ( password_verify($password, $row ['password']) ) {
               header('Location: index.php');

               // cek SESSION 
               $_SESSION ['login'] = true;
               header('Location: index.php');
               exit;
          }
     }
     $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Login</title>
</head>
<body>
     <h1> LOGIN </h1>
     <?php if ( isset($error) ) :?>
          <p style="color: red; font-style: italic;"> Username/Password anda salah </p>
     <?php endif; ?>
          <form action="" method="post">
          <ul>
               <li>
                    <label for="username"> Username : </label>
                    <input type="text" name="username" id="username" required autofocus required size="40">
               </li>
               <li>
                    <label for="password"> Password : </label>
                    <input type="password" name="password" id="password" required required size="40">
               </li>
                    <button type="submit" name="login"> Login </button>
                    <a href="register.php"> Registrasi </a>
          </ul>
     </form>
</body>
</html>