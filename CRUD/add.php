<?php
session_start();
require 'functions.php';

if (!isset($_SESSION['level'])) {
     echo "
          <script>
          alert('Anda belum login');
          alert ('silahkan login terlebih dahulu');
          document.location.href = 'login.php';
          </script>
           ";
     exit;
}

// jika bukan admin jangan lanjut
if ($_SESSION['level'] !== "admin" && ($_SESSION['level'] !== "pegawai")) {
     echo "
          <script>
          alert('Anda tidak mempunyai akses masuk');
          document.location.href = 'login.php';
          </script>
           ";
}



// kode otomatis
$query = mysqli_query($conn, "SELECT max(idbuku) as kodeTerbesar FROM tbbuku ");
$data = mysqli_fetch_assoc($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 5, 5);
$urutan++;
$huruf = "BKU";
$kodeBarang = $huruf . sprintf("%05s", $urutan);



// cek apakah tombol sudah ditekan apa belum
if (isset($_POST['submit'])) {

     if (tambah($_POST) > 0) {
          if ($_SESSION['level'] == "admin") {
               echo "
               <script>
               alert('Data berhasil ditambahkan');
               document.location.href = 'index.php';
               </script>
               ";
          } else if ($_SESSION['level'] == "pegawai") {
               echo "
               <script>
               alert('Data berhasil ditambahkan');
               document.location.href = 'hal_pegawai.php';
               </script>
               ";
          }
     } else if ($_SESSION['level'] !== "admin" && ($_SESSION['level'] !== "pegawai")) {
          echo "
          <script>
          alert('Data gagal ditambahkan');
          document.location.href = 'hal_pegawai.php';
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
     <h1>Tambah Data Barang</h1>
     <form action="" method="post" enctype="multipart/form-data">
          <ul>
               <li>
                    <label for="idbuku"> ID Buku : </label>
                    <input type="text" name="idbuku" id="idbuku" value="<?= $kodeBarang; ?>" readonly>
               </li>

               <li>
                    <label for="namabuku"> Nama Buku : </label>
                    <input type="text" name="namabuku" id="namabuku" autofocus>
               </li>
               <li>
                    <label for="jenisbuku"> Jenis Buku : </label>
                    <input type="text" name="jenisbuku" id="jenisbuku">
               <li>
                    <label for="pengarang"> Penulis : </label>
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
               </li><br>
               <button type="submit" name="submit"> Tambah Data </button>
          </ul>
     </form>
</body>

</html>