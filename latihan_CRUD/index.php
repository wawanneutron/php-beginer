<?php
session_start();
if ( !isset($_SESSION ['login']) ) {
     header('Location: login.php');
     exit;
}
// hubungkan ke function
require 'functions.php';
$databuku = data ( "SELECT * FROM tbbuku ORDER BY idbuku DESC" );


// apakah tombol cari sudah di klik
if ( isset ( $_POST ['cari'] ) ) {
     $databuku =  search ( $_POST ['keywoard'] );
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Master Data</title>
</head>
<body>
     <h1>Data Buku</h1>
     <a href="logout.php"> Logout </a> <br><br>
     <form action="" method="post">
          <input type="text" name="keywoard" size="45" autofocus placeholder="cari barang disini" autocomplete="off">
          <button type="submit" name="cari"> Cari barang </button>
     </form> <br>
     <a href="add.php">Tambah data buku </a>
     <br><br>
     <table border="1" cellpadding="10" cellspacing="0">
          <tr>
               <th>No</th>
               <th>ID Buku</th>
               <th>Nama Buku</th>
               <th>Jenis Buku</th>
               <th>Penulis</th>
               <th>Penerbit</th>
               <th>Harga</th>
               <th>Gambar</th>
               <th>Aksi</th>
          </tr>
          <?php $i = 1; ?>
          <?php foreach ( $databuku as $buku ) :?>
          <tr>
               <td> <?= $i; ?> </td>
               <td> <?= $buku ['idbuku']; ?> </td>
               <td> <?= $buku ['namabuku']; ?> </td>
               <td> <?= $buku ['jenisbuku']; ?> </td>
               <td> <?= $buku ['pengarang']; ?> </td>
               <td> <?= $buku ['penerbit'] ?> </td>
               <td> <?= $buku ['harga']; ?> </td>
               <td>
                    <img src="..\img/<?= $buku ['gambar']; ?>" width="60">
               </td>
               <td>
                    <a href="delete.php?idbuku=<?= $buku ['idbuku']; ?>"onclick = "return confirm('yakin ingin menghapus data ini ?');"> Delete | </a>
                    <a href="update.php?id=<?= $buku ['idbuku']; ?>"onclick = "return confirm ('Yakin ingin merubah barang ?') " >Update
               </td>
          </tr>
          <?php $i++; ?>
     <?php endforeach; ?>
     </table>
     
</body>
</html>