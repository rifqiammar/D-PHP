<?php
session_start();

echo $_SESSION["nama"];

/* 

    Nilai ini akan hilang dalam 1 sesi, satu sesi adalah ketika browser di close atau di tutup

*/