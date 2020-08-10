<?php
$conn = mysqli_connect('localhost', 'root', '', 'dbbuku');


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

// tambah data
function tambah($data)
{
     global $conn;
     $idBuku = $data['idbuku'];
     $namaBuku  = htmlspecialchars($data['namabuku']);
     $jenisBuku = htmlspecialchars($data['jenisbuku']);
     $pengarang = htmlspecialchars($data['pengarang']);
     $penerbit = htmlspecialchars($data['penerbit']);
     $harga = htmlspecialchars($data['harga']);
     // upload gambar jika bukan gambar jangn lanjut
     $gambar = upload();
     if (!$gambar) {
          return false;
     }

     $query = "INSERT INTO tbbuku VALUES ('$idBuku', '$namaBuku', '$jenisBuku', '$pengarang', '$penerbit', '$harga', '$gambar')";
     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
}

function upload()
{
     $namaGambar = $_FILES['gambar']['name'];
     $size = $_FILES['gambar']['size'];
     $error = $_FILES['gambar']['error'];
     $tmpName = $_FILES['gambar']['tmp_name'];


     if ($error === 4) {
          echo "
          <script>
               alert ('Anda harus upload gambar');
          </script>
          ";
          return false;
     }
     // saring yang diupload
     $formatGambarValid = ['png', 'jpg', 'img', 'jpeg'];
     $formatGambar = explode('.', $namaGambar);
     $formatGambar = strtolower(end($formatGambar));
     if (!in_array($formatGambar, $formatGambarValid)) {
          echo "
          <script>
               alert ('upps yang anda masukan bukan gambar');
          </script>
          ";
          return false;
     }

     // ukuran disaring
     if ($size > 1000000) {
          echo "
          <script>
               alert ('Ukuran terlalu besar');
          </script>
          ";
          return false;
     }

     // enkripsi nama gambar
     $enkripsiNama = uniqid();
     $enkripsiNama .= '.';
     $enkripsiNama .= $formatGambar;

     // pindahkan lokasi yang diupload

     move_uploaded_file($tmpName, '..\img/' . $enkripsiNama);
     return $enkripsiNama;
}

// hapus data

function hapus($data)
{
     global $conn;
     mysqli_query($conn, "DELETE FROM tbbuku WHERE idbuku = '$data'");
     return mysqli_affected_rows($conn);
}

// update
function ubah($data)
{

     global $conn;
     $idBuku = $data['idbuku'];
     $namaBuku  = htmlspecialchars($data['namabuku']);
     $jenisBuku = htmlspecialchars($data['jenisbuku']);
     $pengarang = htmlspecialchars($data['pengarang']);
     $penerbit = htmlspecialchars($data['penerbit']);
     $harga = htmlspecialchars($data['harga']);
     $gambarLama = ($data['gambarLama']);
     // upload gambar jika bukan gambar jangn lanjut
     if ($_FILES['gambar']['error'] === 4) {
          $gambar = $gambarLama;
     } else {
          $gambar = upload();
     }

     $query = "UPDATE tbbuku SET
               namabuku = '$namaBuku',
               jenisbuku = '$jenisBuku',
               pengarang = '$pengarang',
               penerbit = '$penerbit',
               harga = '$harga',
               gambar = '$gambar'
               WHERE idbuku = '$idBuku'               
               ";

     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
}
