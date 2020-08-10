<?php
// Tugas pertemuan array_assosiative 
// minimal 5 elemen dan 10 data

$databuku = [
                [ 
                    "Kd Buku" => "BKU001",
                    "Judul Buku" => "Cantik itu luka",
                    "Pengarang" => "Eka kurniawan",
                    "Aliran" => "Novel",
                    "Penerbit" => "Gramedia pustaka utama",
                    "Harga" =>  [115000],
                    "gambar" => "wawan.png"
                ],

                 [ 
                    "Kd Buku" => "BKU002",
                    "Judul Buku" => "Belajar Singkat php7",
                    "Pengarang" => "Budi Raharjo",
                    "Aliran" => "Komputer",
                    "Penerbit" => "INFORMATIKA",
                    "Harga" =>  [115000],
                    "gambar" => "akbar.png"
                ],

                 [ 
                    "Kd Buku" => "BKU003",
                    "Judul Buku" => "Bumi Manusia",
                    "Pengarang" => "Pramoedya Ananta Toer",
                    "Aliran" => "Romance",
                    "Penerbit" => "Lentera Dipantara",
                    "Harga" =>  [115000],
                    "gambar" => "fahmi.png"
                ],

                 [ 
                    "Kd Buku" => "BKU004",
                    "Judul Buku" => "Anak Semua Bangsa",
                    "Pengarang" => "Pramoedya Ananta Toer",
                    "Aliran" => "Romance",
                    "Penerbit" => "Gramedia pustaka utama",
                    "Harga" =>  [115000],
                    "gambar" => "wawan.png"
                ],

                 [ 
                    "Kd Buku" => "BKU005",
                    "Judul Buku" => "Tapak Jejak",
                    "Pengarang" => "Fiersa Besari",
                    "Aliran" => "Novel",
                    "Penerbit" => "Media Kita",
                    "Harga" =>  [115000],
                    "gambar" => "rizky.png"
                ],
         ];



?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Array Assosiative</title>
     <style>
     .tabel{
          background-color: salmon;
          color: white;
          text-align: center;

     } 
     </style>

</head>
<body>
     <center><h1> Data buku yang ada dirumah </h1></center>
     <table border="1" cellpadding="10" cellspacing="0" >
     <?php foreach ( $databuku as $buku ) :?>

          <tr class="tabel" >

              <td> <img src="..\img/<?= $buku ["gambar"] ?> "> </td>

              <td> Kode Buku : <?php echo $buku ["Kd Buku"] ?> </td>
              <td> Judul Buku : <?php echo $buku ["Judul Buku"] ?> </td>
              <td> Pengarang : <?php echo $buku ["Pengarang"] ?> </td>
              <td> Aliran <?php echo $buku ["Aliran"] ?> </td>
              <td> Penerbit : <?php echo $buku ["Penerbit"]  ?> </td>
              <td> Harga : <?php echo $buku ["Harga"] [0] ?> </td>
              
          </tr>
     <?php endforeach; ?>
</table>

</body>
</html>