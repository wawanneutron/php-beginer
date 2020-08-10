<?php
// $mahasiswa = [

//      ["Wawan Setiawan", "2017804143", "wawanneutron1331@gmail.com", "Sistem Informasi"],
//      ["Muhammad Fahmi", "2017804164", "fmfahmi@gmail.com", "Sistem Informasi"],
//      ["Muhammad Akbar", "2017804245", "akbar12@gmail.com", "Sistem Informasi"],
//      ["Rizki Listyo Wibowo", "20178041243", "listyo@gmail.com", "Sistem Informasi"]


// ];

// ==============================================================================================================
// array assosiative
// devisinisnya sama seperti array numerik
// namun key-nya adlah string yang kita buat sendiri


$mahasiswa = [
     [
          "Nama" => "Wawan Setiawan",
          "NPM" => "2017804143",
          "Email" => "wawanneutron1331@gmail.com",
          "Jurusan" => "Sistem Informasi",
          "gambar" => "wawan.png"
     ],

     [
          "Nama" => "Muhammad Akbar",
          "NPM" => "2017804132",
          "Email" => "Akbar@gmail.com",
          "Jurusan" => "Sistem Informasi",
          "gambar" => "akbar.png"
          
     ],

     [
          "Nama" => "Muhammad Fahmi Sutrsina",
          "NPM" => "2017804243",
          "Email" => "fmfahmi@gmail.com",
          "Jurusan" => "Sistem Informasi",
          "gambar" => "fahmi.png"
     ],

     [
          "Nama" => "Rizky Listyo Wibowo",
          "NPM" => "2017804355",
          "Email" => "rizkylist@gmail.com",
          "Jurusan" => "Sistem Informasi",
          "gambar" => "rizky.png"
          
     ]

];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Latihan Assosiative</title>
</head>
<body>
     <h1> Belajar PHP Assosiative </h1>
     <?php foreach ( $mahasiswa as $mhs ) :?>
          <ul>
               <img src="img/<?= $mhs ["gambar"] ?> ">
               <li> <?= $mhs ["Nama"] ?> </li>
               <li> <?= $mhs ["NPM"] ?> </li>
               <li> <?= $mhs ["Email"] ?> </li>
               <li> <?= $mhs ["Jurusan"] ?> </li>
          </ul>
     <?php endforeach; ?>
</body>
</html>
