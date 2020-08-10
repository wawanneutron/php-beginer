<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>bissmilah</title>
     <style>

     .warna{
          background-color: salmon;
          float: left;
          margin: 5px;
      }
   

     </style>
</head>
<body>
     <center>
     <h2> Bissmilahirohmanirohim </h2>
     <h3> Permudahlah hamba belajar program ya Allah </h3> <br>

     <table border="0" cellpadding="10" cellspacing="0" >
          <tr>

                    <?php for ($i=1; $i <= 13 ; $i++) : ?>
                     <!-- menampilkan angka ganjil -->
                     <?php if ($i % 2 == 1) : ?>
                         <td class="warna">
                            

                         <?php else : ?>
                            <td>
                             


                     <?php endif; ?>
                     

                         <?php echo "$i"; ?>
                    <?php endfor; ?>
               </td>

          </tr>


     </table>

     </center>
     
</body>
</html>