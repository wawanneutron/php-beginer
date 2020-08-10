-- perintah tampil
SELECT * FROM tbbuku ORDER BY idbuku DESC 
-- ORDER BY  isbuku DESC / ASC untuk mengurutkan

-- Tambah
INSERT INTO tbbuku VALUES 
-- contoh INSERT INTO tbbuku VALUES ( '', '$variabel', '$variabel' );
-- representasikan dulu terus masukan kedalam variabel terus conekkan dbbnya


-- perintah delete

DELETE FROM tbbuku WHERE idbuku = $variabel
-- mysqli_query ($conn, baru tambahkan diatas )
-- perintah update
UPDATE tbbuku SET idbuku = '$variabel' WHERE idbuku = $variabel 

-- perintah cari
SELECT * FROM tbbuku WHERE namabuku LIKE '%$ketik%' OR
-- OR untk menambahkan kebawah jika ada yg ingin ditambahkana
