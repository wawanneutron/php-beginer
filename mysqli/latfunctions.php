<?php
// Koneksi ke db
$conn = mysqli_connect( 'localhost', 'root', '', 'dbbuku' );
// query tampil
function tampil ($data) {
     global $conn;
     $result = mysqli_query ($conn, $data);
     $rows = [];
     while ( $row = mysqli_fetch_assoc ($result)) {
          $rows [] = $row;
     }
     return $rows;
}

// tambah
function tambah ($data) {
     global $conn;
     // representasikan dulu
     $buku = htmlspecialchars( $data ['namabuku'] );
     $jenis = htmlspecialchars( $data ['jenisbuku'] );
     $pengarang = htmlspecialchars( $data ['pengarang'] );
     $penerbit = htmlspecialchars( $data ['penerbit'] );
     $harga = htmlspecialchars( $data ['harga'] );
     // tambah gambar, apakah memasukan gamabar/ tidak
     $gambar = uploadgambar();
     if (!$gambar) {
          return false;
     }

     $query = "INSERT INTO tbbuku VALUES ( '', '$buku', '$jenis', '$pengarang', '$penerbit', '$harga', '$gambar' )";
     mysqli_query ( $conn, $query );

     return mysqli_affected_rows ( $conn );
}

// upload gambar
function uploadgambar (){
     $namaGambar = $_FILES ['image'] ['name'];
     $size = $_FILES ['image'] ['size'];
     $error = $_FILES ['image'] ['error'];
     $tmpName = $_FILES ['image'] ['tmp_name'];

// jika tidak ada gambar tampilkan kesalahan
     if ( $error === 4 ) {
          echo "
          <script>
          alert('anda tidak memasukan gambar');
          </script>
           ";
     }

     $formatGambarValid = [ 'jpg', 'png', 'jpeg', 'img' ];
     $formatGambar = explode('.', $namaGambar);
     $formatGambar = strtolower(end($formatGambar));
     // jika bukan gambar tampilkan kesalahan
     if (!in_array($formatGambar, $formatGambarValid) ) {
          echo "
          <script>
          alert('upps yang anda masukan bukan gambar');
          </script>
           ";
           return false;
     }

     // batas maks ukuran
     if ($size > 1000000) {
          echo "
          <script>
          alert('upps gambar yang anda masukan > 1MB');
          </script>
           ";
           return false;
     }

     // lolos semua sleksi waktunya upload
     // membuat nama gambar enkripsi
     $namaFileBaru = uniqid();
     $namaFileBaru .= '.';
     $namaFileBaru .= $formatGambar;
     // memindahkan file yang diupload
     move_uploaded_file($tmpName, '..\img/' . $namaFileBaru);
     return $namaFileBaru;

}


// hapus 
function hapus ($hapus) {
     global $conn;
     mysqli_query ( $conn, "DELETE FROM tbbuku WHERE idbuku = $hapus" );
     return mysqli_affected_rows ( $conn );
}

// ubah
function ubah ($ubah) {
     global $conn;
          // representasikan dulu
     $id = $ubah ['idbuku'];
     $buku = htmlspecialchars( $ubah ['namabuku'] );
     $jenis = htmlspecialchars( $ubah ['jenisbuku'] );
     $pengarang = htmlspecialchars( $ubah ['pengarang'] );
     $penerbit = htmlspecialchars( $ubah ['penerbit'] );
     $harga = htmlspecialchars( $ubah ['harga'] );
     $gambarLama = $ubah ['gambarLama'];

     // ganti gambar
     if ( $_FILES ['image'] ['error'] === 4 ) {
          $gambar = $gambarLama;
     }else{
          $gambar = uploadgambar();
     }

     $query = "UPDATE tbbuku SET
               namabuku = '$buku',
               jenisbuku = '$jenis',
               pengarang = '$pengarang',
               penerbit = '$penerbit',
               harga = '$harga',
               gambar = '$gambar'
               WHERE idbuku = $id
               ";
     mysqli_query ( $conn, $query );

     return mysqli_affected_rows ( $conn );
}

// cari

function search ($data) {
     $query = "SELECT * FROM tbbuku WHERE
               namabuku LIKE '%$data%' OR
               idbuku LIKE '%$data%' OR
               pengarang LIKE '%$data%' OR
               penerbit LIKE '%$data%' OR
               harga LIKE '%$data%'
               ";
     return tampil ($query);
}

// registrasi

function registrasi ($data) {
     global $conn;
     $username = stripslashes( strtolower( $data ['username'] ));
     $password = mysqli_real_escape_string ( $conn, $data ['password'] );
     $ulangPassword = mysqli_real_escape_string ( $conn, $data ['ulangPassword'] );

     // cek password

     if ( $password !== $ulangPassword ) {
          echo "
          <script>
          alert ('password salah silahkan ulangi lagi');
          </script>
          ";
          return false;

     }
     // enkripsi dulu passwordnya
     $password = password_hash($password, PASSWORD_DEFAULT);

     // jika sudah semua masukan ke database
     mysqli_query ( $conn, "INSERT INTO users VALUES ('', '$username', '$password','') " );

     return mysqli_affected_rows ( $conn );

}




?>