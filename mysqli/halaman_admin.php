<?php
session_start();
if ($_SESSION ['level'] == ""){
     header ('Location: login.php');
}
$nama = 'Admin';
echo "$nama";

?>