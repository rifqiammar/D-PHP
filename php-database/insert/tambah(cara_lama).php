<?php 
// require_once "functions.php";
$conn = mysqli_connect("localhost", "root", "", "cars99room");

// Cek Apakah Tombol Submit Sudah Ditekan  / Belum?
    if( isset($_POST["submit"]) ){
        
        // ambil data dari tiap elemen dalam from ke dalam variable
        $nama = $_POST["nama"];
        $brand = $_POST["brand"];
        $transmisi = $_POST["transmisi"];
        $harga = $_POST["harga"];
        $gambar = $_POST["gambar"];

        // Query Insert data
        $query = "INSERT INTO produk (nama, brand, transmisi, harga, gambar) 
                    VALUES ('$nama', '$brand', '$transmisi', '$harga', '$gambar')";
        
        mysqli_query($conn, $query);

        // cek apakah data berhasil ditambhakan
        if( mysqli_affected_rows($conn) > 0 ) {

            echo "berhasil" ;

        } else {
            
            echo "gagal!".PHP_EOL;
            echo mysqli_error($conn);

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

    <form action="" method="POST">
        <ul>
            <li>
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama">
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
                <input type="text" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>