<?php
$conn = mysqli_connect('localhost', 'root', '', 'dbbuku');
// Tampil Data
function tampil($data)
{
     global $conn;
     $result = mysqli_query($conn, $data);
     $rows = [];
     while ($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
     }
     return $rows;
}


// tambah Data
function tambah($data)
{
     global $conn;
     // representasikan dulu yang ingin ditambahkan
     $idBuku = $data['idbuku'];
     $nmBuku = htmlspecialchars($data['namabuku']);
     $jenisBuku =  htmlspecialchars($data['jenisbuku']);
     $penulis = htmlspecialchars($data['pengarang']);
     $penerbit = htmlspecialchars($data['penerbit']);
     $harga = htmlspecialchars($data['harga']);
     // upload gambar
     $gambar = upload();
     if ($gambar === false) {
          return false;
     }

     // panggil kedalam mysql
     $query = "INSERT INTO tbbuku VALUES
               ( '$idBuku', '$nmBuku', '$jenisBuku', '$penulis', '$penerbit' ,'$harga', '$gambar' )
               ";
     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
}

function upload()
{
     $nmaBuku = $_FILES['gambar']['name'];
     $size = $_FILES['gambar']['size'];
     $error = $_FILES['gambar']['error'];
     $tmpName = $_FILES['gambar']['tmp_name'];

     if ($error === 4) {
          echo "
          <script>
          alert('Anda tidak memasukan gambar');
          </script>
           ";
          return false;
     }
     // yang anda masukan bukan gambar
     $formadGambarValid = ['jpg', 'png', 'img', 'jpeg'];
     $formatGambar = explode('.', $nmaBuku);
     $formatGambar = strtolower(end($formatGambar));
     if (!in_array($formatGambar, $formadGambarValid)) {
          echo "
          <script>
          alert('Uppss yang anda masukan bukan  gambar');
          </script>
           ";
          return false;
     }

     if ($error > 1000000) {
          echo "
          <script>
          alert('Gambar yang anda masukan > 1MB');
          </script>
           ";
     }


     // membuat nama gambar di encrpisi
     $gambarBaru = uniqid();
     $gambarBaru .= '.';
     $gambarBaru .= $formatGambar;
     // jika semua nya lolos sleksi lanjut ke tahap upload
     move_uploaded_file($tmpName, '..\img/' . $gambarBaru);
     return $gambarBaru;
}



// hapus data
function delete($delete)
{
     global $conn;
     mysqli_query($conn, "DELETE FROM tbbuku WHERE idbuku = '$delete'");
     return mysqli_affected_rows($conn);
}


// update data
function update($data)
{
     global $conn;
     // representasikan dulu yang ingin ditambahkan
     $idbuku = $data['idbuku'];
     $nmBuku = htmlspecialchars($data['namabuku']);
     $jenisBuku =  htmlspecialchars($data['jenisbuku']);
     $penulis = htmlspecialchars($data['pengarang']);
     $penerbit = htmlspecialchars($data['penerbit']);
     $harga = htmlspecialchars($data['harga']);
     // gambar upload
     $gambarLama = htmlspecialchars($data['gambarlama']);
     if ($_FILES['gambar']['error'] === 4) {
          $gambar = $gambarLama;
     } else {
          $gambar = upload();
     }
     // panggil kedalam mysql
     $query = "UPDATE tbbuku SET
               namabuku = '$nmBuku',
               jenisbuku = '$jenisBuku',
               pengarang = '$penulis',
               penerbit = '$penerbit',
               harga = '$harga',
               gambar = '$gambar'
               WHERE idbuku = '$idbuku'
               ";

     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
}

// cari barang
function cari($data)
{
     $query = "SELECT * FROM tbbuku WHERE 
               namabuku LIKE '%$data%' OR
               jenisbuku LIKE '%$data%' OR
               pengarang LIKE '%$data%' OR
               penerbit LIKE '%$data%' OR
               harga LIKE '%$data%' OR
               idbuku LIKE '%$data%'
               ";
     return tampil($query);
}

// Registrasi

function register($data)
{
     global $conn;
     $id = ($data['id_user']);
     $username = strtolower(stripslashes($data['username']));
     $password = mysqli_real_escape_string($conn, $data['password']);
     $cekPassword = mysqli_real_escape_string($conn, $data['ulangPassword']);
     $level = mysqli_real_escape_string($conn, $data['level']);

     // cek password

     if ($password !== $cekPassword) {
          echo "
               <script>
               alert ('Konsfirmasi password salah !');
               </script>
               ";
          return false;
     }



     // enkripsi password
     $password = password_hash($password, PASSWORD_DEFAULT);


     // masukan de database
     mysqli_query($conn, "INSERT INTO users VALUES ( '$id', '$username', '$password', '$level') ");
     return mysqli_affected_rows($conn);
}
