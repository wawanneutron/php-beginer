<?php
require 'functions.php';

$update = $_GET['idbuku'];

$buku = tampil("SELECT * FROM tbbuku WHERE idbuku = '$update'")[0];

if (isset($_POST['submit'])) {
     if (ubah($_POST) > 0) {
          echo "
          <script>
               alert ('Data anda berhasil diupdate');
               document.location.href = 'index.php';
          </script>
          ";
     } else {

          echo "
          <script>
               alert ('Data anda gagal untuk diupdate');
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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tambah Data</title>
</head>

<body>
     <h1> Tambah Data Buku </h1>
     <form action="" method="post" enctype="multipart/form-data">
          <ul>
               <li>
                    <input type="hidden" name="gambarLama" value="<?= $buku['gambar'] ?>">
                    <label for="idbuku"> ID Buku : </label>
                    <input type="text" name="idbuku" id="idbuku" readonly value="<?= $buku['idbuku']; ?>">
               </li>
               <li>
                    <label for="namabuku"> Nama Buku : </label>
                    <input type="text" name="namabuku" id="namabuku" autofocus value="<?= $buku['namabuku']; ?>">
               </li>
               <li>
                    <label for="jenisbuku"> Jenis Buku : </label>
                    <input type="text" name="jenisbuku" id="jenisbuku" value="<?= $buku['jenisbuku'] ?>">
               </li>
               <li>
                    <label for="pengarang"> Pengarang : : </label>
                    <input type="text" name="pengarang" id="pengarang" value="<?= $buku['pengarang'] ?>">
               </li>
               <li>
                    <label for="penerbit"> Penerbit : </label>
                    <input type="text" name="penerbit" id="penerbit" value="<?= $buku['penerbit'] ?>">
               </li>
               <li>
                    <label for="harga"> Harga : </label>
                    <input type="text" name="harga" id="harga" value="<?= $buku['harga'] ?>">
               </li>
               <li>
                    <label for="gambar"> Gambar : </label>
                    <img src="..\img/<?= $buku['gambar'] ?>" width="100">
                    <input type="file" name="gambar" id="gambar">
               </li> <br>
               <button type="submit" name="submit"> Input Barang </button>
          </ul>
          <a href="index.php">Kembali ke data buku</a>
     </form>
</body>

</html>