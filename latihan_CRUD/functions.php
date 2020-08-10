<?php
// koneksi
$conn = mysqli_connect('localhost', 'root', '', 'dbbuku');

// query tampil data
function data($query)
{
     global $conn;
     $result = mysqli_query($conn, $query);
     $rows = [];
     while ($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
     }
     return $rows;
}

// Tambah data buku
function add($data)
{
     global $conn;
     // representasikan dulu
     $id = htmlspecialchars($data['idbuku']);
     $nama = htmlspecialchars($data['namabuku']);
     $jenis = htmlspecialchars($data['jenisbuku']);
     $pengarang = htmlspecialchars($data['pengarang']);
     $penerbit = htmlspecialchars($data['penerbit']);
     $harga = htmlspecialchars($data['harga']);
     // upload gambar
     $gambar = upload();
     if (!$gambar) {
          // bisa juga pakai if ( $gambar === false )
          return false;
     }
     $query = "INSERT INTO tbbuku VALUES ( '$id', '$nama', '$jenis', '$pengarang', '$penerbit', '$harga', '$gambar' )";

     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
}

// uppload
function upload()
{

     $namaFile = $_FILES['gambar']['name'];
     $ukuranFile = $_FILES['gambar']['size'];
     $error = $_FILES['gambar']['error'];
     $tmpName = $_FILES['gambar']['tmp_name'];

     // cek apakah tidak ada gambar yang di upload 4 pesan bawaan bahwa tidak ada gambar yang diupload
     if ($error === 4) {
          echo "
          <script>
          alert ('pilih gambar terlebih dahulu');
          </script>
          ";
          return false;
     }

     // cek apakah yang diupload adalah gambar
     $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
     // untuk memecah sebuah string menjadi array
     $ekstensiGambar = explode('.', $namaFile);
     $ekstensiGambar = strtolower(end($ekstensiGambar));
     // mengecak ekstensi gambar
     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
          echo "
          <script>
          alert ('yang anda upload bukan gambar');
          </script>
          ";
          return false;
     }

     // cek jika ukurannya terlalu besar
     if ($ukuranFile > 1000000) {
          echo "
          <script>
          alert ('ukuran gambar terlalu besar');
          </script>
          ";
          return false;
     }

     // lolos pengecekan gambar siap diupload
     // move_uploaded_file(filename, destination) memindahkan file yang diupload
     $namaFileBaru = uniqid();
     $namaFileBaru .= '.';
     $namaFileBaru .= $ekstensiGambar;

     move_uploaded_file($tmpName, '..\img/' . $namaFileBaru);

     return $namaFileBaru;
}




// delete data

function delete($delete)
{
     global $conn;
     mysqli_query($conn, "DELETE FROM tbbuku WHERE idbuku = '$delete'");
     return mysqli_affected_rows($conn);
}

// update / ubah
function update($data)
{
     global $conn;
     // representasikan dulu
     $id = $data['idbuku'];
     $nama = htmlspecialchars($data['namabuku']);
     $jenis = htmlspecialchars($data['jenisbuku']);
     $pengarang = htmlspecialchars($data['pengarang']);
     $penerbit = htmlspecialchars($data['penerbit']);
     $harga = htmlspecialchars($data['harga']);
     $gambarlama = htmlspecialchars($data['gambarlama']);

     // cek apakah user pilih gambar baru atau tidak
     if ($_FILES['gambar']['error'] === 4) {
          $gambar = $gambarlama;
     } else {
          $gambar = upload();
     }

     $query = "UPDATE tbbuku SET
               namabuku = '$nama',
               jenisbuku = '$jenis',
               pengarang = '$pengarang',
               penerbit = '$penerbit',
               harga = '$harga',
               gambar = '$gambar'
               WHERE idbuku = '$id'
              ";

     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
}


// search

function search($search)
{
     $query = "SELECT * FROM tbbuku WHERE
               namabuku LIKE '%$search%' OR
               jenisbuku LIKE '%$search%' OR
               pengarang LIKE '%$search%' OR
               penerbit LIKE '%$search%' OR
               harga LIKE '%$search%' OR
               idbuku LIKE '%$search%'
               ";
     return data($query);
}


// Registrasi

function registrasi($data)
{
     global $conn;
     $username = strtolower(stripslashes($data['username']));
     $password = mysqli_real_escape_string($conn, $data['password']);
     $ulangPassword = mysqli_real_escape_string($conn, $data['ulangPassword']);
     // cek password
     if ($password !== $ulangPassword) {
          echo "<script>
          alert('Password salah !, silahkan ulangi lagi');
          </script>
          ";
          return false;
     }

     // enkripsi password
     $password = password_hash($password, PASSWORD_DEFAULT);

     // masukan de database users

     mysqli_query($conn, "INSERT INTO users VALUES ( '', '$username', '$password' ) ");


     return mysqli_affected_rows($conn);
}
