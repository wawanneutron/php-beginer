<!-- pengulamgaan paa array dengan foreach -->
<?php
$namamhs = [
     ["wawan setiawan","2017804143","Sistem Informasi","wawanmraz1331@gmail.com"],
      ["Cebong","1997804143","Planga Plongo","makaarbos@agamail.com"],
       ["loe hood","202046532","make a car bos","luhud@gmail.com"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>latihan array 3</title>
</head>
<body>
     <h2> Daftar Mahasiswa </h2>

     <?php foreach ($namamhs as $nama) : ?>
          <ul>
               <li> Nama    :  <?= $nama [0]; ?> </li>
               <li> NPM     :  <?= $nama [1]; ?> </li>
               <li> Jurusan :  <?= $nama [2]; ?> </li>
               <li> Email   :  <?= $nama [3]; ?> </li>
          </ul>
     <?php endforeach; ?>
</body>
</html>
