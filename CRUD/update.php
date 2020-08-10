<?php
session_start();

if ( !isset($_SESSION ['level']) == "admin" ) {
     header("Location: login.php");
     exit;
}

require 'functions.php';

$update = $_GET ['id'];

$namabuku = tampil ( "SELECT * FROM tbbuku WHERE idbuku = '$update'" ) [0];
// cek apakah tombol sudah ditekan apa belum
if ( isset( $_POST ['submit'] ) ) {
     if ( update ( $_POST ) > 0 ) {
          echo "
          <script>
          alert('Data berhasil diupdate');
          document.location.href = 'index.php';
          </script>
           ";
     } else {
          echo "
          <script>
          alert('Data gagal diupdate');
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
     <h1>Update Data Barang</h1>
     <form action="" method="post" enctype="multipart/form-data">
     <ul>
               <input type="hidden" name="gambarlama" value="<?= $namabuku ['gambar'] ?>">
          <li>
               <label for="idbuku"> ID Buku : </label>
               <input type="text" name="idbuku" id="idbuku" value="<?= $namabuku ['idbuku']; ?>" readonly>
          </li>
          <li>
               <label for="namabuku"> Nama Buku : </label>
               <input type="text" name="namabuku" id="namabuku" value="<?= $namabuku ['namabuku']; ?>" autofocus>
          </li>
          <li>
               <label for="jenisbuku"> Jenis Buku : </label>
               <input type="text" name="jenisbuku" id="jenisbuku" value="<?= $namabuku ['jenisbuku']; ?>">
          <li>
               <label for="pengarang"> Penulis : </label>
               <input type="text" name="pengarang" id="pengarang" value="<?= $namabuku ['pengarang']; ?>">
          </li>
          <li>
               <label for="penerbit"> Penerbit : </label>
               <input type="text" name="penerbit" id="penerbit" value="<?= $namabuku ['penerbit']; ?>">
          </li>
          <li>
               <label for="harga"> Harga : </label>
               <input type="text" name="harga" id="harga" value="<?= $namabuku ['harga']; ?>">
          </li>
          <li>
               <label for="gambar"> Gambar : </label>
               <img src="..\img/<?= $namabuku ['gambar']; ?>" width="60">
               <input type="file" name="gambar" id="gambar">
          </li><br>
          <button type="submit" name="submit"> Update Data </button>
     </ul>
     </form>
     <a href="index.php"> Kembali ke databarang </a>
</body>
</html>