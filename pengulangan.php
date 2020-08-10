<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Latihan dasar php</title>
</head>
<center>
<body>
     <h2> Belajar dasar PHP </h2>
     <table border="1" cellpadding="10" cellspacing="0" >
          <?php for ($i=1; $i <= 3 ; $i++) : ?>
               <tr>
                    <?php
                    for ($j=1; $j <= 5 ; $j++) : ?>
                         <td> <?php echo "$i, $j"; ?>  </td>
                    <?php endfor ?>

               </tr>


          <?php endfor ?>
          



     </table>
     
</body>
</center>
</html>