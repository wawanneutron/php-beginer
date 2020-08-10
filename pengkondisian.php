<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Latihan3</title>
     
</head>
<style>
     .warna
     {
          background-color: salmon;
     }
</style>
<center>
<body>
     <h3> Latihan Dasar PHP </h3>

     <table border="1" cellpadding="10" cellspacing="0" >
          <?php for ($i=1; $i <= 7 ; $i++) :?>
               <!-- menampilkan nilai ganjil -->
               <?php if ($i % 2 == 1) :?>
                    <!-- jika ganjil maka akan berwarna salmon -->
                    <tr class="warna">
                         <?php else : ?>
                         <tr>
               <?php endif; ?>
                    <?php for ($j=1; $j <= 5 ; $j++) :?>
                         <td> <?php echo "$i, $j"; ?> </td>
                    <?php endfor; ?>
                    
               </tr>
          <?php endfor; ?>

     </table>
     
</body>
</center>
</html>