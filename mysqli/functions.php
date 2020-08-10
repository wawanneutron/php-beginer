<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbbuku");

// query menampilkan data dari database
function query($query)
{
     global $conn;
     $result = mysqli_query($conn, $query);
     $rows = [];
     while ($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
     }
     return $rows;
}



// function tambah
function tambah($data)
{
     global $conn;
     $buku = htmlspecialchars($data["namabuku"]);
     $jenis = htmlspecialchars($data["jenisbuku"]);
     $pengarang = htmlspecialchars($data["pengarang"]);
     $penerbit = htmlspecialchars($data["penerbit"]);
     $harga = htmlspecialchars($data["harga"]);
     // jika tidak ada gambar, jalankan false
     $gambar = uploadgambar();
     if ($gambar === false) {
          return false;
     }
     //jika ada gambar diteruskan ke query
     $query = "INSERT INTO tbbuku VALUES ( '', '$buku', '$jenis', '$pengarang', '$penerbit', '$harga', '$gambar' )";
     mysqli_query($conn, $query);

     return mysqli_affected_rows($conn);
}
// upload
function uploadgambar()
{

     $namaFile = $_FILES['image']['name'];
     $ukuranFile = $_FILES['image']['size'];
     $error = $_FILES['image']['error'];
     $tmpName = $_FILES['image']['tmp_name'];
     // cek jika tidak ada gambar yang diupload maka akan muncul notif dan gagal untuk tambah data karna bernilai -1 maka akan diteruskan ke else tambah.php
     if ($error === 4) {
          echo "
               <script>
               alert('pilih gambar terlebih dahulu');
               </script>
                ";
          return false;
     }

     // format yang akan diupload
     $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
     // pecah sebuah string menjadi array
     $ekstensiGambar = explode('.', $namaFile);
     $ekstensiGambar = strtolower(end($ekstensiGambar));
     // mengecek exstensi gambar
     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
          echo "
               <script>
               alert('yang anda upload bukan gambar');
               </script>
                ";
          return false;
     }

     // cek jika ukurannya terlalu besar
     if ($ukuranFile > 1000000) {
          echo "
               <script>
               alert('ukuran gambar terlalu besar');
               </script>
                ";
          return false;
     }
     // lolos pengecekan gambar diatas , lalu gambar siap upload gannnn
     $namaFileBaru = uniqid();
     $namaFileBaru .= '.';
     $namaFileBaru .= $ekstensiGambar;
     // memindahkan file yang diupload
     move_uploaded_file($tmpName, '..\img/' . $namaFileBaru);
     return $namaFileBaru;
}

// Delete

function hapus($idbuku)
{
     global $conn;
     mysqli_query($conn, "DELETE FROM tbbuku WHERE idbuku = $idbuku");

     return mysqli_affected_rows($conn);
}

// update
function update($data)
{
     // koneksi
     global $conn;
     // representasikan dulu
     $id = $data['idbuku'];
     $buku = htmlspecialchars($data['namabuku']);
     $jenis = htmlspecialchars($data['jenisbuku']);
     $pengarang = htmlspecialchars($data['pengarang']);
     $penerbit = htmlspecialchars($data['penerbit']);
     $harga = htmlspecialchars($data['harga']);
     $gambarlama = htmlspecialchars($data['gambarlama']);
     // cek apakah user pilih gambar baru atau tidak 
     if ($_FILES['image']['error'] === 4) {
          $gambar = $gambarlama;
     } else {
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

     mysqli_query($conn, $query);

     return mysqli_affected_rows($conn);
}



// query cari

function cari($ketik)
{
     $query = "SELECT * FROM tbbuku WHERE
               namabuku LIKE '%$ketik%' OR
               jenisbuku LIKE '%$ketik%' OR
               pengarang LIKE '%$ketik%' OR
               penerbit LIKE '%$ketik%' OR
               harga LIKE '%$ketik%' OR
               idbuku LIKE '%$ketik%'
               ";

     return query($query);
}
