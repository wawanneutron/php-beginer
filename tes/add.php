<?php
require 'functions.php';

// kode otomatis
$query = mysqli_query($conn, "SELECT max(idbuku) as kodeTerbesar FROM tbbuku");
$data = mysqli_fetch_assoc($query);
$kodeBuku = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBuku, 5, 5);
$urutan++;
$huruf = "BKU";
$kodeBuku = $huruf . sprintf("%05s", $urutan);


// cek tombol
if (isset($_POST['submit'])) {
     if (tambah($_POST) > 0) {
          echo "
               <script>
                    alert ('Data berhasil ditambahkan');
                    document.location.href = 'index.php';
               </script>
               ";
     } else {
          echo "
               <script>
                    alert ('Data gagal ditambahkan');
                    document.location.href = 'index.php';
               </script>
               ";
     }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tambah Data</title>
</head>

<body>
     <h1> Tambah Data Buku </h1>
     <form action="" method="post" enctype="multipart/form-data">
          <ul>
               <li>
                    <label for="idbuku"> ID Buku : </label>
                    <input type="text" name="idbuku" id="idbuku" readonly value="<?= $kodeBuku; ?>">
               </li>
               <li>
                    <label for="namabuku"> Nama Buku : </label>
                    <input type="text" name="namabuku" id="namabuku" autofocus>
               </li>
               <li>
                    <label for="jenisbuku"> Jenis Buku : </label>
                    <input type="text" name="jenisbuku" id="jenisbuku">
               </li>
               <li>
                    <label for="pengarang"> Pengarang : : </label>
                    <input type="text" name="pengarang" id="pengarang">
               </li>
               <li>
                    <label for="penerbit"> Penerbit : </label>
                    <input type="text" name="penerbit" id="penerbit">
               </li>
               <li>
                    <label for="harga"> Harga : </label>
                    <input type="text" name="harga" id="harga">
               </li>
               <li>
                    <label for="gambar"> Gambar : </label>
                    <input type="file" name="gambar" id="gambar">
               </li> <br>
               <button type="submit" name="submit"> Input Barang </button>
          </ul>
          <a href="index.php">Kembali ke data buku</a>
     </form>
</body>

</html>