<?php 
require_once "functions.php";

// Ambil Data Id DI URL
$id = $_GET['id'];


// Menquery Satu data Mobil Berdasarkan ID untuk dimasukan kedalam Value
$car = query("SELECT * FROM produk WHERE id=$id")[0];



// Cek Apakah Tombol Submit Sudah Ditekan  / Belum?
    if( isset($_POST["submit"]) ){

        // Cek Apakah data berhasil di ubah
        if(ubah($_POST) > 0){

            echo "
                    <script>
                        alert('Data Berhasil di Ubah!');
                        document.location.href = 'index.php';
                    </script> ";

        }else {
            
            echo " 
                <script>
                    alert('Data Gagal di Ubah!');
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
    <title>Ubah Data Mobil</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="POST">
        <ul>           
                <input type="hidden" name="id" value="<?=$car["id"];?>">  <!-- Mengirimkan id dengan input Hidden -->          
            <li>
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama" required value="<?=$car["nama"];?>">  <!-- value="" Digunakan untuk mengisi Value table form -->
            </li>
            <li>
                <label for="brand">brand</label>
                <input type="text" name="brand" id="brand" required value="<?=$car["brand"];?>">
            </li>
            <li>
                <label for="transmisi">transmisi</label>
                <input type="text" name="transmisi" id="transmisi" required value="<?=$car["transmisi"];?>">
            </li>
            <li>
                <label for="harga">harga</label>
                <input type="text" name="harga" id="harga" required value="<?=$car["harga"];?>">
            </li>
            <li>
                <label for="gambar">gambar</label>
                <input type="text" name="gambar" id="gambar" required value="<?=$car["gambar"];?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>