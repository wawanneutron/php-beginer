<?php
require 'latfunctions.php';
$databuku = tampil ("SELECT * FROM tbbuku ORDER BY idbuku DESC");

if (isset($_POST ['cari'])) {
     $databuku = search ($_POST ['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Data Barang</title>
</head>
<body>
     
     <h1> DATA BUKU </h1>
     <form action="" method="post">
     <input type="text" name="keyword" size="45" autofocus autocomplete="off" placeholder="silahkan cari">
     <button type="submit" name="cari"> Cari Barang </button>
     </form>
     <br> <br>
     <a href="tambahdata.php"> Tambah Data Buku </a><br> <br>
     <table border="1" cellpadding="10" cellspacing="0">
          <tr>
               <th>No</th>
               <th>Kode Buku</th>
               <th>Nama Buku</th>
               <th>Jenis Buku</th>
               <th>Penulis</th>
               <th>Penerbit</th>
               <th>Harga</th>
               <th>Gambar</th>
               <th>Aksi</th>
          </tr>
          <?php $i=1; ?>
          <?php foreach ( $databuku as $buku ) :?>
          <tr>
               <td> <?= $i; ?> </td>
               <td> <?= $buku ['idbuku']; ?> </td>
               <td> <?= $buku ['namabuku']; ?> </td>
               <td> <?= $buku ['jenisbuku']; ?> </td>
               <td> <?= $buku ['pengarang']; ?> </td>
               <td> <?= $buku ['penerbit']; ?> </td>
               <td> <?= $buku ['harga']; ?> </td>
               <td>
                    <img src="..\img/<?= $buku ['gambar']; ?>" width="50">
               </td>
               <td>
                    <a href="hapus.php?id=<?= $buku ['idbuku']; ?>" onclick = "return confirm('Yakin ingin menghapus data ?');" > Hapus | </a>
                    <a href="ubah.php?id=<?= $buku['idbuku'];?>" onclick = "return confirm('ingin merubah data ?');"> Ubah </a>
               </td>

          </tr>
          <?php $i++; ?>
     <?php endforeach; ?>
          
     </table>
</body>
</html>