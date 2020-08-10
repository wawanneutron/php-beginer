<?php 
require 'latfunctions.php';

if ( isset($_POST ['registrasi']) ) {
     if (  registrasi ( $_POST ) > 0 ) {
          echo "
          <script>
          alert ('Registrasi berhasil...');
          </script>
          ";
     }else{
          mysqli_affected_rows ($conn);
     }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Registrasi</title>
</head>
<body>
     <h1>Silahkan Registrasi</h1>
     <form action="" method="post">
          <ul>
               <li>
                    <label for="username"> Username : </label>
                    <input type="text" name="username" id="username" autofocus placeholder="silahkan diisi">
               </li>
               <li>
                    <label for="password"> Password : </label>
                    <input type="password" name="password" id="password">
               </li>
               <li>
                    <label for="ulangPassword"> Ulangi Password : </label>
                    <input type="password" name="ulangPassword" id="ulangPassword">
               </li>
               <br>
               <br>
               <button type="submit" name="registrasi"> Registrasi </button>
          </ul>
          
     </form>
</body>
</html>