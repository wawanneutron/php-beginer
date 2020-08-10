<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>$_POST</title>
</head>
<body>


     <?php if (isset($_POST["submit"])) : ?>
          <h1>Selamat Datang, <?= $_POST["nama"]; ?> </h1>
     <?php endif; ?>



<form action="" method="post" > 

     Masukan Nama :
     <input type="text" name="nama">
     <br>
     <button type="submit" name="submit"> Kirim!</button>

</form>

</body>
</html>