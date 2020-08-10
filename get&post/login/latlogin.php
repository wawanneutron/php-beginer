<?php

     // cek apakah tombol sudah di tekan apa belum
     if ( isset ($_POST ["submit"] )) {

     // cek username dan passwordnya
          if ( $_POST ["username"] == "neutron" && $_POST ["password"] == "123" ) {
     // jika benar masuk ke halaman berikutnya
               header ("Location: ..\get1.php");
               exit;
          }else{
     // jika salah tampilkan peringatan
               $salah = true;
          }


}

include ("idulfitri.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>latihan $_POST</title>
     <style>
          .mr{
               color: red;
               
          }
     </style>
</head>
<body>
     <h1>Selamat datang,</h1>
     <h2>Silahkan Login</h2>
     <!-- menampilkan kesalahan saat login gagal -->
     <?php if ( isset ( $salah ) ) :?>
          <h3 class="mr" > Username dan Password anda salah!! </h3>

     <?php endif; ?>
     <!--  -->
     <ul>
          <form action="" method="post" >
          <li> 
               <label for="username"> Username : </label>
               <input type="text" name="username" id="username">
          </li><br>

          <li>
               <label for="password"> Password :  </label>
               <input type="password" name="password" id="password">
          </li>
               <button type="submit" name="submit"> Masuk! </button>
          </form>
     </ul>
</body>
</html>