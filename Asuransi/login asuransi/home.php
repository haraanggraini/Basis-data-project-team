<?php
include "session.php";
include "koneksi.php";
?>

 <p align="center">
  Halo, selamat datang <b> <?php echo $_SESSION['username']; ?> </b> <br> Silahkan <a href="logout.php"> <b> Logout </b> untuk keluar dari page
 </p>