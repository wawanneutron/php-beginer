
<?php
session_start();

require 'latfunctions.php';

if ( isset($_POST ['login']) ) {
     $username = $_POST ['username'];
     $password = $_POST ['password'];
     $result = mysqli_query ( $conn, "SELECT * FROM users WHERE username = '$username' and password = '$password' " );

     // menghitung jumlah data yg ditemukan
     $row = mysqli_num_rows ($result);

     // cek apakah username dan pasword ditemukan pada database
     if ($row > 0) {

          $data = mysqli_fetch_assoc ($result);
          // cek jika user login sebagai admin
          if ($data ['level'] == "admin") {

               // buat session login dan username
               $_SESSION ['username'] = $username;
               $_SESSION ['level'] = "admin";
               // alihkan kehalaman admin
               header('Location: index.php');
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
     <h1>Silahkan Login</h1>
     <a href="registrasi.php"> Registrasi </a> <br>
     <?php if ( isset($error) ) :?>
          <p style="color: red; font-style: italic;"> Username / Password anda salah </p>
<?php endif; ?>
     <form action="" method="post">
          <ul>
               <li>
                    <label for="username"> Username : </label>
                    <input type="username" name="username" id="username" autofocus required>
               </li>
               <li>
                    <label for="password"> Password : </label>
                    <input type="password" name="password" id="password" required>
               </li>
               <br>
               <button type="submit" name="login"> Login </button>
          </ul>
          
     </form>
</body>
</html>
