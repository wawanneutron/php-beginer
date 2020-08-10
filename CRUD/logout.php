<?php
session_start();

// menghapus session
$_SESSION = [];
session_unset();
session_destroy();

// menghapus cookie


setcookie('no', '', time() - 3600);
setcookie('key', '', time() - 3600);

setcookie('nop', '', time() - 3600);
setcookie('keyp', '', time() - 3600);

header("location: login.php");
