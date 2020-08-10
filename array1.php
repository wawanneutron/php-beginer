<?php

// pengulangan pada array
// for / foreach

$angka = [3,2,14,13,4,6,50,90,100,400,540,9,7];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>latihan2</title>
     <style>
          .kotak{
               width: 50px;
               height: 50px;
               background-color: salmon;
               text-align: center;
               line-height:  50px;
               float: left;
               margin: 5px;
               transform: translate( 670% );

          }
          .h{
                position: absolute;
                transform: translate( 208% );
                bottom: 400px;
                top: 0x;
          }

          .clear{
               clear: both;

          }

     </style>
</head>
<body>
     <center>
          <h2> Ini dibuat dengan For </h2>
               <?php for ($i=0; $i < count($angka) ; $i++) : ?> 
          <div class="kotak" > <?php echo $angka [$i] ?> </div>
     <?php endfor; ?>

     <div class="clear"> <br> <h2> Ini dibuat dengan foreach </h2> <br> </div>
   

     <?php foreach ($angka as $a ) : ?>
          <div class="kotak" > <?php echo $a; ?> </div>
     <?php endforeach; ?>



     </center>

</body>
</html>