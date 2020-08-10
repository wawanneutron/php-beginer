<?php
// membuat $_GET dengan array assosiative 
// yang telah dipelajari

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
     <title>Belajar $_GET</title>
     <style>
         .kanan{
            float: left;
            padding-top: 50px;
            transform: translateY(50%);
            margin-left: 0px;
            padding-left: 85px;
         }
     </style>


</head>
<body>
     <center><h1> Data buku yang ada dirumah </h1></center>
     <?php foreach ( $databuku as $buku ) :?>
        <ul class="kanan" >
            <a href="latihan2.php?img=<?= $buku ["gambar"];?>&kd=<?= $buku ["Kd Buku"]; ?> &judul=<?= $buku ["Judul Buku"]; ?>&pengarang=<?= $buku ["Pengarang"]; ?>&aliran= <?= $buku ["Aliran"]; ?> &penerbit= <?= $buku ["Penerbit"]; ?>&hrg=<?= $buku ["Harga"] [0]; ?> "><img src="..\img/<?= $buku ["gambar"]; ?> "></a>

            <li> <?= $buku ["Judul Buku"] ?> </li>



        </ul>
     <?php endforeach; ?>
</table>

</body>
</html>