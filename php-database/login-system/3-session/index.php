<?php  
session_start();

// Cek Session jika tidak ada session log in maka kembalikan ke halaman login
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require_once "functions.php";




$produk = query("SELECT * FROM produk ORDER BY id DESC"); 

if ( isset($_POST["keyword"])) {
    
    $produk =  cari($_POST["keyword"]);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mobil</h1>

    <a href="tambah.php">Tambah Data Mobil</a>
    <br><br>

    <form action="" method="POST">
        <input type="text" name="keyword" autofocus placeholder="Masukan Keyword.." autocomplete="off">
    </form>
    <br>


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
    <?php foreach($produk as $value): ?>
    <tr>
        <td><?= $i++; ?></td>
        <td>
            <a href="ubah.php?id=<?= $value['id'];?>">Ubah</a> |
            <a href="hapus.php?id=<?= $value['id'];?>" onclick=" return confirm('Yakin?');">Hapus</a>
        </td>
        <td><img src="img/<?= $value['gambar'];?>" alt="<?=$value['brand'];?>" width="100"></td>
        <td><?= $value['nama']; ?></td>
        <td><?= $value['brand']; ?></td>
        <td><?= $value['transmisi']; ?></td>
        <td><?= $value['harga']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>