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


function ubah($data){
    
    global $conn;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $brand = htmlspecialchars($data["brand"]);
        $transmisi = htmlspecialchars($data["transmisi"]);
        $harga = htmlspecialchars($data["harga"]);
        $gambar = htmlspecialchars($data["gambar"]);

        $query = "UPDATE produk SET 
                                nama = '$nama',
                                brand = '$brand',
                                transmisi = '$transmisi',
                                harga = '$harga',
                                gambar = '$gambar'     
                         WHERE id = $id             
                                                            ";

    mysqli_query($conn, $query);

    // Mengembalikan nilai angka dari mysqli_affected_rows unutuk mengecek berhasil atau tidak
    return mysqli_affected_rows($conn);
}

function cari ($keyword) {

    $query = "SELECT * FROM produk 
                WHERE
              nama LIKE  '%$keyword%' OR
              brand LIKE '%$keyword%' OR
              transmisi LIKE '%$keyword%' 
              ";

    return query($query);
}





