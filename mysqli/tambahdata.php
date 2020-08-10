<?php

require 'latfunctions.php';
// cek apakah tombol sudah ditekan
if ( isset( $_POST ["submit"] ) ) {

// cek apakah data berhasil ditambah atau tidak
     if ( tambah ($_POST) > 0 ) {
          echo "
               <script>
               alert ('Data berhasil ditambah');
               document.location.href = 'tampil.php';
               </script>
           ";
     }else{
          echo "
               <script>
               alert ('Data gagal ditambahkan !');
               document.location.href = 'tampil.php';
               </script>
           ";
     }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Tambah Data</title>
</head>
<body>
     <h1>Tambah Data Buku</h1>
     <form action="" method="post" enctype="multipart/form-data">
          <ul>
               <li>
                    <label for="namabuku"> Nama Buku : </label>
                    <input type="text" name="namabuku" id="namabuku" required autofocus placeholder="wajib diisi">
               </li>
               <li>
                    <label for="jenisbuku"> Jenis Buku : </label>
                    <input type="text" name="jenisbuku" id="jenisbuku">
               </li>
               <li>
                    <label for="pengarang"> Pengarang : </label>
                    <input type="text" name="pengarang" id="pengarang">
               </li>
               <li>
                    <label for="penerbit"> Penerbit : </label>
                    <input type="text" name="penerbit" id="penerbit">
               </li>
               <li>
                    <label for="harga"> Harga : </label>
                    <input type="text" name="harga" id="harga">
               </li>
               <li>
                    <label for="gambar"> Gambar : </label>
                    <input type="file" name="image" id="gambar">
               </li>
               <br>
               <button type="submit" name="submit"> Input Data! </button>
          </ul>
     </form>
     <a href="tampil.php"> Kembali ke data buku </a>
</body>
</html>