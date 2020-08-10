<?php
session_start();


if (!isset($_SESSION['level'])) {
     echo "
          <script>
          document.location.href = 'login.php';
          </script>
           ";
     exit;
}

// jika bukan admin jangan lanjut
if ($_SESSION['level'] !== "admin") {
     echo "
          <script>
          alert('Anda bukan admin');
          document.location.href = 'login.php';
          </script>
           ";
     exit;
}

require 'functions.php';

$databuku =  tampil("SELECT * FROM tbbuku ORDER BY idbuku DESC");


// tombol cari ditekan
if (isset($_POST['cari'])) {
     $databuku =  cari($_POST['keywoard']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <title>Buku</title>
</head>

<body>
     <h1>Data Buku</h1>
     <a href="logout.php"> Logout </a> <br> <br>
     <form action="" method="post">
          <input type="text" name="keywoard" size="45" autofocus placeholder="Silahkan cari disini" autocomplete="off" id="keywoard">
          <button type="submit" name="cari" id="tombol-cari"> Cari Barang </button><br><br>
     </form>

     <a href="add.php"> Tambah data buku </a> <br> <br>
     <div id="container">
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
               <?php foreach ($databuku as $buku) : ?>
                    <tr>
                         <td> <?= $i; ?> </td>
                         <td> <?= $buku['idbuku']; ?> </td>
                         <td> <?= $buku['namabuku']; ?> </td>
                         <td> <?= $buku['jenisbuku']; ?> </td>
                         <td> <?= $buku['pengarang']; ?> </td>
                         <td> <?= $buku['penerbit']; ?> </td>
                         <td> <?= $buku['harga']; ?> </td>
                         <td>
                              <img src="..\img/<?= $buku['gambar']; ?>" width="60">
                         </td>
                         <td>
                              <a href="delete.php?id=<?= $buku['idbuku']; ?>" onclick="return confirm('yakin ingin dihapus ?'); "> Delete |
                                   <a href="update.php?id=<?= $buku['idbuku']; ?>" onclick="return confirm('Yakin ingin update barang ?'); ">Update
                         </td>
                    </tr>
                    <?php $i++; ?>
               <?php endforeach; ?>

          </table>
     </div>
     <script src="js/jquery-3.5.1.min.js"></script>
     <script src="js/script.js"></script>
</body>

</html>