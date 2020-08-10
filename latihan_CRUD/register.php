<?php
require 'functions.php';
 if ( isset( $_POST ['register'] ) ) {
     if ( registrasi ( $_POST ) > 0 ){
          echo "
          <script>
          alert('Registrasi Berhasil');
          </script>
          ";
     }else {
          mysqli_affected_rows ( $conn );
     }
 }




?>



<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Register</title>
</head>
<body>
     <h1> Silahkan Registrasi </h1>
     <ul>
          <form action="" method="post">
          <li>
               <label for="username"> Username : </label>
               <input type="text" name="username" id="username">
          </li>
          <li>
               <label for="password"> Password : </label>
               <input type="password" name="password" id="password">
          </li>
          <li>
               <label for="ulangPassword"> Ulangi Password : </label>
               <input type="password" name="ulangPassword" id="ulangPassword">
          </li>
          <button type="submit" name="register"> Registrasi </button>
          </form>
     </ul>
</body>
</html>