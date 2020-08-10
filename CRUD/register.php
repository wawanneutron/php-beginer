<?php
require 'functions.php';

// / kode otomatis
$query = mysqli_query($conn, "SELECT max(id_user) as kodeTerbesar FROM users ");
$data = mysqli_fetch_assoc($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 5, 5);
$urutan++;
$huruf = "ID";
$kodeBarang = $huruf . sprintf("%05s", $urutan);



// cek username sudah ada apa belum
if (isset($_POST['register'])) {

     $username = $_POST['username'];
     $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
     if (mysqli_fetch_assoc($result)) {
          echo "
               <script>
                    alert ('Username sudah ada');
                    document.location.href = 'register.php';
               </script>
                ";

          return false;
     }
}
// cek registrasi berhasil atau tidak
if (isset($_POST['register'])) {
     if (register($_POST) > 0) {

          echo "
          <script>
          alert('Registrasi berhasil...');
          document.location.href = ('login.php');
          </script>
           ";
     } else {
          mysqli_affected_rows($conn);
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
                    <label for="id_user"> ID: </label>
                    <input type="text" name="id_user" id="id_user" value="<?= $kodeBarang ?>" readonly>
               </li>
               <li>
                    <label for="username"> Username : </label>
                    <input type="text" name="username" id="username" required>
               </li>
               <li>
                    <label for="password"> Password : </label>
                    <input type="password" name="password" id="password" required>
               </li>
               <li>
                    <label for="ulangiPassword"> Ulangi Password : </label>
                    <input type="password" name="ulangPassword" id="ulangiPassword" required>
               </li>
               <li>
                    <label for="level"> Level : </label>
                    <select name="level">
                         <option selected value="admin"> Admin </option>
                         <option value="pegawai"> Pegawai </option>
                    </select>
               </li>

               <li>

                    <button type="submit" name="register"> Registrasi </button>
               </li>


          </ul>
     </form>
</body>

</html>