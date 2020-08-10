<?php
// koneksi ke database

$conn = mysqli_connect( "localhost", "root", "", "dbbuku" );

// ambil data dari tabel buku / query data buku

$result = mysqli_query ( $conn, "SELECT * FROM tbbuku" );


// ambil data (fetch) tbbuku dari object result
// ada 4 cara penggunaan

// mysqli_fetch_row () // -> mengambil array numerik
// mysqli_fetch_assoc() // -> mengembalkikan array assosiative
// mysqli_fetch_array() // bisa row dan asssoc, tidak recomended karna data nya akan doble , jika datanya banyak akan berat
// mysqli_fetch_object() // nilai object

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Halaman Admin</title>
</head>
<body>

     <h1> DATA BUKU </h1>
     <table border="1" cellpadding="10" cellspacing="0">

          <tr>
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
          <?php while ( $row = mysqli_fetch_assoc ( $result ) ) :?>

          <tr>
               <td> <?= $i ?> </td>
               <td> <?= $row ["namabuku"]; ?> </td>
               <td> <?= $row ["jenisbuku"]; ?> </td>
               <td> <?= $row ["pengarang"]; ?> </td>
               <td> <?= $row ["penerbit"]; ?> </td>
               <td> <?= $row ["harga"]; ?> </td>
               <td>
                    <img src="..\img/<?= $row ["gambar"] ?> " width="50">
               </td>
               <td>
                    <a href=""> Edit |
                    <a href=""> Delete
               </td>

          </tr>
          <?php $i++; ?>

     <?php endwhile; ?>
          

     </table>
     
</body>
</html>