// ambil elemen-elemen yang dibutuhkan
var keyword = document.getElementById('keywoard');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function () {

     // buat object ajax
     var xhr = new XMLHttpRequest();

     // mengecek kesiapan ajax
     xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
               container.innerHTML = xhr.responseText;

          }
     }

     // eksekusi ajax
     xhr.open('GET', 'ajax/databuku.php?keyword=' + keyword.value, true);
     xhr.send();


});