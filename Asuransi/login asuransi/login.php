<?php
session_start();
include "koneksi.php";
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" value="Login" name="proseslog">
        <div class="signup_link">
        </div>
      </form>
    </div>

  </body>
</html>

<?php
if(isset($_POST['proseslog'])){
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$_POST[username]' AND password = '$_POST[password]'");

  $cek = mysqli_num_rows($sql);
  if($cek > 0){
    $_SESSION['username'] = $_POST['username'];    
    echo "<meta http-equiv=refresh content=0;URL='Admin.html'>";
  }else{
    $result = '<div style="margin-top:130px;text-align:center;color:white;"><b>Username atau Password salah !</b></div>';
    echo $result;
    echo "<meta http-equiv=refresh content=2;URL='login.php'>";
  }

}
?>