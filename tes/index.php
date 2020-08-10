<?php
require 'functions.php';
$databuku = tampil("SELECT * FROM tbbuku ORDER BY idbuku DESC");



?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Data Barang</title>
</head>

<body>
     <h1>Data Buku</h1>
     <button><a href="add.php"> Tambah Data Buku </a> </button> <br> <br>
     <table border="1" cellpadding="10" cellspacing="0">
          <tr>
               <td colspan="10" align="center">TABEL DATA BUKU </td>
          </tr>
          <tr>
               <th> No </th>
               <th> ID Buku </th>
               <th> Nama Buku </th>
               <th> Jenis Buku </th>
               <th> Penulis </th>
               <th> Penerbit </th>
               <th> Harga </th>
               <th> Gambar </th>
               <th colspan="2"> Aksi </th>
          </tr>
          <?php $i = 1; ?>
          <?php foreach ($databuku as $buku) : ?>
               <tr>
                    <td> <?= $i; ?> </td>
                    <td> <?= $buku['idbuku']; ?> </td>
                    <td> <?= $buku['namabuku'] ?> </td>
                    <td> <?= $buku['jenisbuku']; ?> </td>
                    <td> <?= $buku['pengarang']; ?> </td>
                    <td> <?= $buku['penerbit']; ?> </td>
                    <td> <?= $buku['harga']; ?> </td>
                    <td>
                         <img src="..\img/<?= $buku['gambar']; ?>" width="60">
                    </td>
                    <td> <a href="update.php?idbuku=<?= $buku['idbuku'] ?>" onclick="return confirm ('Anda yakin ingin mengupdate data') "> Update </a> </td>
                    <td> <a href="delete.php?idbuku=<?= $buku['idbuku'] ?>" onclick="return confirm ('Anda yakin ingin menghapus data') "> Delete </a> </td>
               </tr>
               <?php $i++; ?>
          <?php endforeach; ?>

     </table>
</body>

</html>