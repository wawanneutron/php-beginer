<?php
require 'functions.php';

$idbuku = $_GET ["idbuku"];

if ( hapus ( $idbuku ) > 0 ) {
               echo "
               <script>
               alert ('Data berhasil dihapus');
               document.location.href = 'index.php';
               </script>
           ";
}else{
               echo "
               <script>
               alert ('Data gagal dihapus !!');
               document.location.href = 'index.php';
               </script>
           ";
}

?>