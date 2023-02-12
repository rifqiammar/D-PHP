<?php 
session_start();

// Cek Session jika tidak ada session log in maka kembalikan ke halaman login
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require_once "functions.php";

// Cek Apakah Tombol Submit Sudah Ditekan  / Belum?
    if( isset($_POST["submit"]) ){
        if(tambah($_POST) > 0){

            echo "
                    <script>
                        alert('Data Berhasil di tambahkan!');
                        document.location.href = 'index.php';
                    </script> ";

        }else {
            
            echo " 
                <script>
                    alert('Data Gagal di tambahkan!');
                    document.location.href = 'index.php';
                </script> ";
            
        }    

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mobil</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="POST" enctype="multipart/form-data"> <!-- Agar Form bisa mengelola Filenya maka harus menambahkan Attribut enctype="multipart/form-data" -->
    <!-- Untuk String Dikelola Oleh $_POST dan Untuk File akan dikelola oleh $_FILE -->
        <ul>
            <li>
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="brand">brand</label>
                <input type="text" name="brand" id="brand">
            </li>
            <li>
                <label for="transmisi">transmisi</label>
                <input type="text" name="transmisi" id="transmisi">
            </li>
            <li>
                <label for="harga">harga</label>
                <input type="text" name="harga" id="harga">
            </li>
            <li>
                <label for="gambar">gambar</label>
                <input type="file" name="gambar" id="gambar"> <!-- Mengubah Type gambar dari Text Menjadi File -->
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>