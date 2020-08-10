<?php
if ( !isset( $_GET ["img"] ) ) {
     header("Location:get1.php");

exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>latihan $_GET</title>
</head>
<body>
     <ul>
          <img src="../img\<?= $_GET["img"] ?> ">
          <li> <?= $_GET ["nopol"]; ?> </li>
          <li> <?= $_GET ["nma"]; ?> </li>
          <li> <?= $_GET ["jns"]; ?> </li>
          <li> <?= $_GET ["wrn"]; ?> </li>
          <li> <?= $_GET ["th"]; ?> </li>
          <li> <?= $_GET ["dnd"]; ?> </li>

     </ul>
     <a href="get1.php">Kembali ke halaman utama</a>
</body>
</html>