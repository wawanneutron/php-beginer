<?php
session_start();
if ( !isset($_SESSION ['login']) ) {
     header('Location: login.php');
     exit;
}

require 'functions.php';
$hapus = $_GET ['idbuku'];

if ( delete ($hapus) > 0 ) {
     echo "
          <script>
          alert ('Data sudah dihapus');
          document.location.href = 'index.php';
          </script>
          ";
     }else{
          echo "
          <script>
          alert ('Data sudah dihapus');
          document.location.href = 'index.php';
          </script>
          ";
     }


?>