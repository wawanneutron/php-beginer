<?php
session_start();
if (!isset($_SESSION['login'])) {
     header('Location: login.php');
     exit;
}

require 'functions.php';

// kode otomatis

$query = mysqli_query($conn, "SELECT max(idbuku) as kodeTerbesar FROM tbbuku");
$data = mysqli_fetch_assoc($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 5, 5);
$urutan++;
$huruf = "BKU";
$kodeBarang = $huruf . sprintf("%05s", $urutan);


// cek tombol sudah ditekan apa blum

if (isset($_POST['submit'])) {

     if (add($_POST) > 0) {
          echo "
               <script>
               alert ('Data berhasil ditambah');
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
     <title>Tambah Data</title>
</head>

<body>
     <h1>Tambah Data Buku</h1>
     <form action="" method="post" enctype="multipart/form-data">
          <ul>
               <label for="idbuku"> ID Buku: </label>
               <input type="text" name="idbuku" id="idbuku" value="<?= $kodeBarang ?>" readonly> <br>

               <label for="namabuku"> Nama Buku : </label>
               <input type="text" name="namabuku" id="namabuku" autofocus required> <br>

               <label for="jenisbuku"> Jenis Buku : </label>
               <input type="text" name="jenisbuku" id="jenisbuku" required=> <br>

               <label for="penulis"> Penulis : </label>
               <input type="text" name="pengarang" id="penulis" required> <br>

               <label for="penerbit"> Penerbit : </label>
               <input type="text" name="penerbit" id="penerbit" required> <br>

               <label for="harga"> Harga : </label>
               <input type="text" name="harga" id="harga" required> <br>

               <label for="gambar"> Gambar : </label>
               <input type="file" name="gambar" id="gambar"> <br> <br>

               <button type="submit" name="submit"> Tambah Data </button>
          </ul>
     </form>
     <a href="index.php"> Kembali ke data buku </a>
</body>

</html>