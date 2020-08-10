<?php
session_start();

if (!isset($_SESSION['level'])) {
     echo "
          <script>
          alert('Anda belum login, silahkan login');
          document.location.href = 'login.php';
          </script>
           ";
}

// jika bukan admin jangan lanjut
if ($_SESSION['level'] !== "admin") {
     echo "
          <script>
          alert('Anda bukan admin');
          document.location.href = 'login.php';
          </script>
           ";
}

require 'functions.php';

$delete = $_GET['id'];

if (delete($delete) > 0) {
     echo "
     <script>
     alert('Data berhasil dihapus');
     document.location.href = 'index.php';
     </script>
      ";
} else {
     echo "
     <script>
     alert('Data gagal dihapus');
     document.location.href = 'index.php';
     </script>
      ";
}
