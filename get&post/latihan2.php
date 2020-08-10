<?php
// cek apakah tidak ada data di $_GET
if (!isset($_GET["judul"])) {
     # code...
     header("Location:latihan1.php");
     exit;
}

// redirect memindahkan ke halman lain




?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>lat 2 $_GET</title>
</head>
<body>
     <ul>
          <img src="..\img/<?= $_GET["img"] ?> ">
          <li> <?= $_GET["kd"]; ?> </li>
          <li> <?= $_GET["judul"]; ?> </li>
          <li> <?= $_GET["pengarang"]; ?> </li>
          <li> <?= $_GET["aliran"]; ?> </li>
          <li> <?= $_GET["penerbit"]; ?> </li>
          <li> <?= $_GET["hrg"]; ?> </li>
     </ul>
     <a href="latihan1.php"> Kembali ke daftar buku </a>
     
</body>
</html>


