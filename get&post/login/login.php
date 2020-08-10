<?php
     // cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST ["submit"])) {

     // cek username dan passwordnya
     if ($_POST ["nama"]=="wawan" && $_POST ["password"]=="123") {
     // jika benar masuk kehalaman admin
          header("Location:admin.php");
          exit;

     }else{
     // jika salah tampilkan pesan kesalahannya
          $salah = true;
     }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Login</title>
     <style>
          .er{
               color: red;
               font-style: italic;
               

          }
     </style>
</head>
<body>
     <h1>Login Admin</h1>
     <!-- peringatan erro -->
     <?php if (isset($salah)) :?>
          <h3><p class="er"> username/password anda salah</p></h3>
     <?php endif; ?>

     <ul>
     <form action="" method="post">
          <li>
               <label for="username"> username : </label>
          
               <input type="text" name="nama" id="username">
          </li>

          <li>
               <label for="password"> password : </label>
          
               <input type="password" name="password" id="password">
          </li>
               <button type="submit" name="submit" > Login </button>

     </ul>
          


     </form>
     
</body>
</html>