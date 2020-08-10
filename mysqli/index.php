<?php
session_start();
// cek session
if ($_SESSION ['level'] == ""){
     header('Location: login.php?pesan=gagal');
}

require 'functions.php';

// query tampil
$databuku = query ("SELECT * FROM tbbuku ORDER BY idbuku DESC");

// jika tombol cari di klik
if (isset($_POST ['cari'])) {
     $databuku = cari ($_POST['ketik']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Halaman Admin</title>
</head>
<body>

     <h1> DATA BUKU </h1>
     <a href="logout.php" onclick="return confirm ('yakin ingin logout ?'); "> Logout </a>
     <br>
     <form action="" method="post">
          <input type="text" name="ketik" size="40" autofocus placeholder="masukan keywoard pencarian.." autocomplete="off">
          <button type="submit" name="cari"> Cari </button>
     </form>
     <br><br>
     <a href="tambah.php"> Tambah data buku </a> 
     <br><br>
     <table border="1" cellpadding="10" cellspacing="0">

          <tr>
               <th> No </th>
               <th> ID Buku </th>
               <th> Nama Buku </th>
               <th> Jenis Buku </th>
               <th> Pengarang </th>
               <th> Penerbit </th>
               <th> Harga </th>
               <th> Gambar </th>
               <th> Aksi </th>
          </tr>

          <?php $i = 1; ?>
          <?php foreach ( $databuku as $row ) :?>
               
          <tr>
               <td> <?= $i; ?> </td>
               <td> <?= $row ["idbuku"]; ?> </td>
               <td> <?= $row ["namabuku"]; ?> </td>
               <td> <?= $row ["jenisbuku"]; ?> </td>
               <td> <?= $row ["pengarang"]; ?> </td>
               <td> <?= $row ["penerbit"]; ?> </td>
               <td> <?= $row ["harga"]; ?> </td>
               <td>
                    <img src="..\img/<?= $row ["gambar"]; ?> " width="50">
               </td>
               <td>
                    <a href="update.php?id=<?= $row ["idbuku"]; ?>" onclick = "return confirm('Yakin ingin merubah data ?'); "> Update | </a>
                    <a href="delete.php?idbuku=<?= $row ["idbuku"]; ?>" onclick = "return confirm('Yakin ingin hapus ?');"> Delete </a>
               </td>
          </tr>
          <?php $i++; ?>

     <?php endforeach; ?>
          

     </table>
     
</body>
</html>