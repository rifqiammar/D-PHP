<?php 
 
 $conn = mysqli_connect("localhost", "root", "", "cars99room");

 
// Query Untuk Menampilkan data
function query($query) {
    global $conn;
    
    $result = mysqli_query($conn, $query);

    $rows = [];

    while($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;

}

// Function Tambah Data

function tambah($data){
    
    global $conn;
    
        $nama = htmlspecialchars($data["nama"]);
        $brand = htmlspecialchars($data["brand"]);
        $transmisi = htmlspecialchars($data["transmisi"]);
        $harga = htmlspecialchars($data["harga"]);
        $gambar = htmlspecialchars($data["gambar"]);

        $query = "INSERT INTO produk (nama, brand, transmisi, harga, gambar) 
                    VALUES ('$nama', '$brand', '$transmisi', '$harga', '$gambar')";

    mysqli_query($conn, $query);

    // Mengembalikan nilai angka dari mysqli_affected_rows unutuk mengecek berhasil atau tidak
    return mysqli_affected_rows($conn);
}



function hapus($id){
    
    global $conn;

    $query = "DELETE FROM produk WHERE id=$id" ;
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}