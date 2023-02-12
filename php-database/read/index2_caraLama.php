<?php 
// Koneksi Ke Database
$db = mysqli_connect("localhost", "root", "", "cars99room");

// Membuat Variable Query agar rapih
$query = "SELECT * FROM produk";

// Ambil Data Produk / Query Data Produk
$result = mysqli_query($db, $query);

// Mengambil data (fetch) produk dari object result/query 
    /* mysqli_fetch_row()     | Mengembalikan Array Numeric
        mysqli_fetch_assoc()  | Mengembalikan Array Assosiative
        mysqli_fetch_array()  | Mengembalikan Array Numeric dan Assosiative
        mysqli_fetch_object()  | Mengembalikan Object
     */

 $rows = [];

    //  while($row = mysqli_fetch_assoc($result)){

    //     $rows[] = $row;
    // }

    //  var_dump($rows['nama']);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    
<h1>Daftar Mahasiswa</h1>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Brand</th>
        <th>Transmisi</th>
        <th>Harga</th>
    </tr>
    <?php $i = 1 ?>
    <?php while( $row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $i++; ?></td>
        <td>
            <a href="">Ubah</a> |
            <a href="">Hapus</a>
        </td>
        <td><img src="img/<?= $row['gambar'];?>" alt="BMW" width="100"></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['brand']; ?></td>
        <td><?= $row['transmisi']; ?></td>
        <td><?= $row['harga']; ?></td>
    </tr>
    <?php endwhile; ?>

</table>

</body>
</html>