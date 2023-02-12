<?php  
session_start();

// Cek Session jika tidak ada session log in maka kembalikan ke halaman login
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require_once "functions.php";

$id = $_GET["id"];


if( hapus($id) > 0 ){

    echo "
    <script>
        alert('Data Berhasil di Hapus!');
        document.location.href = 'index.php';
    </script> ";

}else {
            
    echo " 
        <script>
            alert('Data Gagal di Hapus!');
            document.location.href = 'index.php';
        </script> ";
    
}