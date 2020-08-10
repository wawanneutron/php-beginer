$(document).ready(function () {
     // hilanhkan tombol cari
     $('#tombol-cari').hide();

     // event ketika keyword ditulis
     $('#keywoard').on('keyup', function () {
          $('#container').load('ajax/databuku.php?keywoard=' + $('#keywoard').val());
     });

});