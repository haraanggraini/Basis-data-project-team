<?php 
    // koneksi database
    include 'config.php';
    
    // menangkap data yang di kirim dari form
    $kode_asuransi = $_POST['kode_asuransi'];
    $jenis_asuransi = $_POST['jenis_asuransi'];
    $jangka_waktu = $_POST['jangka_waktu'];
    $biaya_asuransi = $_POST['biaya_asuransi'];
    
    // update data ke database
    mysqli_query($conn,"UPDATE tb_asuransi SET jenis_asuransi='$jenis_asuransi', jangka_waktu='$jangka_waktu', biaya_asuransi='$biaya_asuransi' where kode_asuransi='$kode_asuransi'");
    
    header("location:index.php");
    
?>