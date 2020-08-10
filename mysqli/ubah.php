<?php

require 'latfunctions.php';

$ubah = $_GET ['id'];
$buku = tampil ("SELECT * FROM tbbuku where idbuku = $ubah") [0];
// cek apakah tombol sudah ditekan
if ( isset( $_POST ["submit"] ) ) {

// cek apakah data berhasil diUbah atau tidak
     if ( ubah ($_POST) > 0 ) { die;
          echo " 
               <script>
               alert ('Data berhasil di ubah');
               document.location.href = 'tampil.php';
               </script>
           ";
     }else{die;
          echo "
               <script>
               alert ('Data gagal di ubah !');
               document.location.href = 'tampil.php';
               </script>
           ";
     }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Ubah Data</title>
</head>
<body>
     <h1>Ubah Data Buku</h1>
     <form action="" method="post" enctype="multipart/form-data">
          <ul>
               <input type="hidden" name="gambarLama" value="<?= $buku ['gambar']; ?>" >
               <input type="hidden" name="idbuku" value="<?= $buku['idbuku']; ?>">
               <li>
                    <label for="namabuku"> Nama Buku : </label>
                    <input type="text" name="namabuku" id="namabuku" required autofocus placeholder="wajib diisi" value="<?= $buku ['namabuku']; ?>">
               </li>
               <li>
                    <label for="jenisbuku"> Jenis Buku : </label>
                    <input type="text" name="jenisbuku" id="jenisbuku" value="<?= $buku ['jenisbuku'] ?>">
               </li>
               <li>
                    <label for="pengarang"> Pengarang : </label>
                    <input type="text" name="pengarang" id="pengarang" value="<?= $buku ['pengarang'] ?>">
               </li>
               <li>
                    <label for="penerbit"> Penerbit : </label>
                    <input type="text" name="penerbit" id="penerbit" value="<?= $buku ['penerbit'] ?>">
               </li>
               <li>
                    <label for="harga"> Harga : </label>
                    <input type="text" name="harga" id="harga" value="<?= $buku ['harga'] ?>">
               </li>
               <li>
                    <label for="gambar"> Gambar : </label>
                    <img src="..\img/<?= $buku ['gambar']; ?>" width="50">
                    <input type="file" name="image" id="gambar">
               </li>
               <br>
               <button type="submit" name="submit"> Ubah Data! </button>
          </ul>
     </form>
     <a href="index.php"> Kembali ke data buku </a>
</body>
</html>