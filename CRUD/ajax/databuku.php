<?php
require '../functions.php';
$keyword = $_GET['keywoard'];
$query = "SELECT * FROM tbbuku WHERE 
               namabuku LIKE '%$keyword%' OR
               jenisbuku LIKE '%$keyword%' OR
               pengarang LIKE '%$keyword%' OR
               penerbit LIKE '%$keyword%' OR
               harga LIKE '%$keyword%' OR
               idbuku LIKE '%$keyword%'
               ";
$databuku = tampil($query);


?>

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