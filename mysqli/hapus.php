<?php
require 'latfunctions.php';

$hapus = $_GET ['id'];

if ( hapus ( $hapus ) > 0 ) {
     echo "
     <script>
     alert('data anda sudah dihapus');
     document.location.href = 'tampil.php';
     </script>
      ";
}else {
       echo "
     <script>
     alert('gagal menghapus data');
     document.location.href = 'tampil.php';
     </script>
      ";
}


?>