<?php

// array
// variabel yang memiliki banyak  nilai
// elemen pada array boleh memiliki tipe data yang berbeda




// membuat array
// cara lama
$hari = array("senin", "selasa", "rabu");
// cara baru
$bulan = ["januari", "fevruari", "maret"];
$berbeda = [123, "tulisan", false, true];





// menampilkan Array

var_dump($berbeda);
echo "<br>";

print_r($bulan);
echo "<br>";

var_dump($hari);
echo "<br>";
echo "<br>";

// menampilan elemen pada array

echo $berbeda  [0];




?>