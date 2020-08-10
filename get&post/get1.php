<?php 

// latihan membuat get
$datamobil = [ 
               [
                    "nopol" => "B123DL",
                    "namambl" => "Avanza",
                    "jenis" => "MPV",
                    "warna" => "Hitam",
                    "thn" => "2010",
                    "denda" => [200000],
                    "gambar" => "akbar.png"
               ],

               [
                    "nopol" => "A113ZZ",
                    "namambl" => "Pajero Sport",
                    "jenis" => "SUV",
                    "warna" => "Hitam",
                    "thn" => "2018",
                    "denda" => [1000000],
                    "gambar" => "wawan.png"
               ],

               [
                    "nopol" => "B255CF",
                    "namambl" => "Xpander",
                    "jenis" => "MPV",
                    "warna" => "Putih",
                    "thn" => "2010",
                    "denda" => [400000],
                    "gambar" => "fahmi.png"
               ],

               [
                    "nopol" => "D532C",
                    "namambl" => "BMW",
                    "jenis" => "MPV",
                    "warna" => "Hitam",
                    "thn" => "2010",
                    "denda" => [600000],
                    "gambar" => "rizky.png"
               ],

               [
                    "nopol" => "B143AL",
                    "namambl" => "Alphard",
                    "jenis" => "SUV",
                    "warna" => "Hitam",
                    "thn" => "2019",
                    "denda" => [1300000],
                    "gambar" => "wawan.png"
               ],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>latihan $_GET </title>
     <style>
          .img{
               float: left;
               margin: 6px;
          }
          .ad{
               float: left;
               padding-left: 500px;
               
          }

     </style>
</head>
<body>
     <h1>Latihan Membuat $_GET</h1>

     <?php foreach ( $datamobil as $mobil ) :?>
          <ul class="img">
               <a href="get2.php?img=<?= $mobil ["gambar"]; ?>&nopol= <?= $mobil ["nopol"]; ?>&nma= <?= $mobil ["namambl"]; ?>&jns= <?= $mobil ["jenis"]; ?>&wrn= <?= $mobil ["warna"]; ?>&th= <?= $mobil ["thn"]; ?>&dnd= <?= $mobil ["denda"][0]; ?> "> <img src="..\img/<?= $mobil ["gambar"]; ?> ">
          </ul>
     <?php endforeach; ?>

      <a class="ad" href="login/latlogin.php"> Logout </a>


</body>
</html>