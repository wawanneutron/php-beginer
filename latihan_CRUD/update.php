<?php
session_start();
if ( !isset($_SESSION ['login']) ) {
     header('Location: login.php');
     exit;
}

require 'functions.php';
// tangkap link url
$update = $_GET ['id'];
// query buku berdasarkan idbuku
$buku = data ( "SELECT * FROM tbbuku WHERE idbuku = '$update'" ) [0];
// cek apakah tombol sudah ditekan apa belum
if ( isset( $_POST ['submit'] ) ) {
     // cek apakah berhasil diupdate atau tidak
     if ( update ( $_POST ) > 0 ) {
          echo "
               <script>
               alert ('Data berhasil di Update');
               document.location.href = 'index.php';
               </script>
               ";
     }else{
               echo "
               <script>
               alert ('Data gagal di Updatekan');
               document.location.href = 'index.php';
               </script>
               ";
     }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Update Data</title>
</head>
<body>
     <h1>Update Data Buku</h1>
     <form action="" method="post" enctype="multipart/form-data">
     <input type="hidden" name="gambarlama" value="<?= $buku ['gambar']; ?>">
     <ul>
          <label for="idbuku"> ID Buku : </label>
          <input type="text" name="idbuku" id="idbuku" value="<?= $buku ['idbuku']; ?>" readonly> <br>

          <label for="namabuku"> Nama Buku : </label>
          <input type="text" name="namabuku" id="namabuku" required autofocus value="<?= $buku ['namabuku']; ?>"> <br>

          <label for="jenisbuku"> Jenis Buku : </label>
          <input type="text" name="jenisbuku" id="jenisbuku" value="<?= $buku ['jenisbuku']; ?>"> <br>

          <label for="penulis"> Penulis : </label>
          <input type="text" name="pengarang" id="penulis" value="<?= $buku ['pengarang']; ?>"> <br>

          <label for="penerbit"> Penerbit : </label>
          <input type="text" name="penerbit" id="penerbit" value="<?= $buku ['penerbit']; ?>"> <br>

          <label for="harga"> Harga : </label>
          <input type="text" name="harga" id="harga" required value="<?= $buku ['harga']; ?>"> <br><br>

          <label for="gambar"> Gambar : </label>
          <img src="..\img/<?= $buku ['gambar']; ?>" width="65">
          <input type="file" name="gambar" id="gambar"> <br> <br>

          <button type="submit" name="submit"> Update Data </button>
     </ul>
     </form>
     <a href="index.php"> Kembali ke data buku </a>
</body>
</html>