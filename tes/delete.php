<?php

require 'functions.php';

$delete = $_GET['idbuku'];
if (hapus($delete) > 0) {
     echo "
          <script>
               alert ('Data berhasil dihapus');
               document.location.href = 'index.php';
          </script>
     ";
} else {
     echo "
          <script>
               alert ('Data gagal dihapus');
               document.location.href = 'index.php';
          </script>
     ";
}
