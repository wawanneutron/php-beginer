<?php
// latihan membuat pengulangan
// dengan foreach
$user = [ ["U001","Wawan","Tangerang 13/09/1997","Tigaraksa","Kab.Tangerang","Rt 001/03"],
          ["U002","Fahmi","Tangerang 3/6/1997","Pasarkemis","Kab.Tangerang","Rt 004/03"],
          ["U003","Fandi","Tangerang 5/8/1999","Mauk","Kab.Tangerang","Rt 003/03"],
          ["U004","Rizky","Pekalongan 3/4/1997","Pasarkemis","Kab.Tangerang","Rt 001/04"]
     ];


?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>foreach</title>
</head>
<body>
     <h2> Builth Looping with foreach </h2>
     <?php foreach ($user as $u ) : ?>
          <ul>
               <li> <?php echo $u [0]; ?> </li>
               <li> <?php echo $u [1]; ?> </li>
               <li> <?php echo $u [2]; ?> </li>
               <li> <?php echo $u [3]; ?> </li>
               <li> <?php echo $u [4]; ?> </li>
               <li> <?php echo $u [5]; ?> </li>
          </ul>
     <?php endforeach; ?>
</body>
</html>