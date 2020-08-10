<?php
session_start();
if ( !isset($_SESSION ['pegawai']) ) {
     header('Location: login.php');
     exit;
}
$nama = 'Pegawai';
echo "$nama";

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Document</title>
</head>
<body>
     <h1>Halaman Pegawai</h1>
     <a href="logout.php"> Logout </a>
</body>
</html>