<?php  

// Koneksi Ke Database
$db = mysqli_connect("localhost", "root", "", "cars99room");


function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}