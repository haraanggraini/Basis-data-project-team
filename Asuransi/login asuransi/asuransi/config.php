<?php
    $host = 'localhost';
    $db = 'asuransi';
    $usr = 'root';
    $pwd = '';
    
    $conn = mysqli_connect($host, $usr, $pwd, $db);
    
    if (!$conn) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }
?>