<?php
    $host     = "localhost";
    $username = "root";
    $password = "";
    $database = "kasir_cs";
    $koneksi  = mysqli_connect($host, $username, $password, $database);

    if (! $koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>
