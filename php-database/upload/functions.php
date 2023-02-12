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
        
        // Setelah gambar berhasil di Upload di directory, lalu nama gambar di ambil dan disimpan di database
        // nama gambar di ambil setelah berhasil mengupload file gambarnya jika gagal query tidak di jalankan

        // upload gambar
        $gambar = upload(); // jika fungsi upload berhasil akan mengupload gambar dan mengirimkan string nama

        if ( !$gambar ) {
            // Jika upload gambar gagal maka fungsi tambah tidak di jalankan / false
            return false;
        }
        

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

         // upload gambar
         $gambar = upload(); // jika fungsi upload berhasil akan mengupload gambar dan mengirimkan string nama

         if ( !$gambar ) {
             // Jika upload gambar gagal maka fungsi tambah tidak di jalankan / false
             return false;
         }


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



function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error   = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
                alert('Pilih Gambar Terlebih dahulu!');
              </script>";
              return false;

    }

    // Cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

    $ekstensiGambar = explode('.', $namaFile);   //  rifqiammar.jp = ['rifqiammar', 'jpg'] titik(.) menjadi pemisah/delimiter
    //  $ext = pathinfo($namaFile, PATHINFO_EXTENSION); // ekstensi cara lain

    // Mengambil array yang terakhir
    // Mengubah semua ekstensi menjadi huruf kecil
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            // $ext = strtolower($ext);
            
    // Mencari ekstensi gambar yang di upload ada ngga di $ekstensiGambarValid
    // Jika yang di upload tidak ada di ekstensi yang Valid maka
    if ( !in_array($ekstensiGambar , $ekstensiGambarValid) ) {
        echo "<script>
                  alert('yang anda upload bukan gambar!');
             </script>";
        return false;

    }

    // Cek jika ukurun terlalu besar
    if ($ukuranFile > 1000000 ) // Dalam Byte
    {
        echo "<script>
                  alert('Ukuran Gambar Terlalu Besar!');
             </script>";
        return false;
    }

    // Jika Lolos pengecekan gambar siap di upload
    // generate nama gambar / file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;

}


