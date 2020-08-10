<?php
session_start();
require 'functions.php';


// cek cookie

if (isset($_COOKIE['no']) && isset($_COOKIE['key'])) {
     $no  = $_COOKIE['no'];
     $key = $_COOKIE['key'];

     // ambil username berdasarkan id_user
     $result = mysqli_query($conn, "SELECT username FROM users WHERE id_user = '$no'");
     $row    = mysqli_fetch_assoc($result);

     // cek cookie dan username
     if ($key === hash('sha256', $row['username'])) {
          $_SESSION['level'] = 'admin';
          header("Location: index.php");
     }
} else if (isset($_COOKIE['nop']) && isset($_COOKIE['keyp'])) {
     $nop  = $_COOKIE['nop'];
     $keyp = $_COOKIE['keyp'];

     // ambil username berdasarkan id_user
     $result = mysqli_query($conn, "SELECT username FROM users WHERE id_user = '$nop'");
     $row    = mysqli_fetch_assoc($result);

     // cek cookie dan username
     if ($keyp === hash('sha256', $row['username'])) {
          $_SESSION['level'] = 'pegawai';
          header("Location: hal_pegawai.php");
     }
}
// end cookie



if (isset($_POST['login'])) {
     $username = $_POST['username'];
     $password = $_POST['password'];

     $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
     // mengecek username dan pasword
     if (mysqli_num_rows($result) === 1) {

          // cek password
          $row = mysqli_fetch_assoc($result);
          if (password_verify($password, $row['password'])) {

               // cek jika user login sebagai admin
               if ($row['level'] == "admin") {

                    // buat session login dan username
                    $_SESSION['username'] = $username;
                    $_SESSION['level'] = "admin";

                    // cek remember me
                    if (isset($_POST['remember'])) {
                         // buat cookie
                         setcookie('no', $row['id_user'], time() + 60);
                         setcookie('key', hash('sha256', $row['username']), time() + 60);
                    }

                    header("Location: index.php");
                    exit;
                    // cek juga jika user login sebagai pegawai
               } else if ($row['level'] == "pegawai") {

                    $_SESSION['username'] = $username;
                    $_SESSION['level'] = "pegawai";

                    // cek remember me
                    if (isset($_POST['remember'])) {
                         // buat cookie
                         setcookie('nop', $row['id_user'], time() + 60);
                         setcookie('keyp', hash('sha256', $row['username']), time() + 60);
                    }

                    header("Location: hal_pegawai.php");
                    exit;
               }
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
     <link rel="stylesheet" href="style.css">
</head>

<body>

     <?php if (isset($error)) : ?>
          <script>
               alert('Username / password salah');
               document.location.href = 'login.php';
          </script>
     <?php endif; ?>

     <form action="" method="post">


          <div class="login-box">

               <h1>Login</h1>

               <div class="text-box">
                    <i class="user"></i>
                    <input type="text" name="username" required autofocus placeholder="Username" autocomplete="off">
               </div>

               <div class="text-password">
                    <i class="password"></i>
                    <input type="password" name="password" required required placeholder="Password">
               </div>

               <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember" size="40">

                    <label for="remember"> Remember me </label>
               </div>

               <button type="submit" class="btn" name="login" value="sig in"> Login </button>
          </div>

     </form>

</body>

</html>