<?php

require 'functions.php';

// ambil data di url
$id = $_GET ['id'];

// query data buku berdasarkan id
$buku = query ( "SELECT * FROM tbbuku WHERE idbuku = $id")[0];

// cek apakah tombol sudah ditekan
if ( isset( $_POST ["submit"] ) ) {

// cek apakah data berhasil diupdate atau tidak
     if ( update ($_POST) > 0 ) {
          echo "
               <script>
               alert ('Data berhasil diubah');
               document.location.href = 'index.php';
               </script>
           ";
     }else{
          echo "
               <script>
               alert ('Data gagal diubah !');
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
               <input type="hidden" name="idbuku"value="<?= $buku ['idbuku']; ?>">
               <li>
                    <label for="namabuku"> Nama Buku : </label>
                    <input type="text" name="namabuku" id="namabuku" value="<?= $buku ['namabuku']; ?>">
               </li>
               <li>
                    <label for="jenisbuku"> Jenis Buku : </label>
                    <input type="text" name="jenisbuku" id="jenisbuku" value = "<?= $buku ['jenisbuku']; ?>">
               </li>
               <li>
                    <label for="pengarang"> Pengarang : </label>
                    <input type="text" name="pengarang"id="pengarang" value = "<?= $buku ['pengarang']; ?>">
               </li>
               <li>
                    <label for="penerbit"> Penerbit : </label>
                    <input type="text" name="penerbit"id="penerbit" value = "<?= $buku ['penerbit']; ?>">
               </li>
               <li>
                    <label for="harga"> Harga : </label>
                    <input type="text" name="harga"id="harga" value = "<?= $buku ['harga']; ?>">
               </li>
               <li>
                    <label for="gambar"> Gambar : </label>
                    <img src="..\img/<?= $buku ['gambar']; ?>" width="60">
                    <input type="file" name="image"id="gambar">
               </li>
               <button type="submit" name="submit"> Update Data! </button>
          </ul>
     </form>
     <a href="index.php"> Kembali ke data buku </a>
</body>
</html>