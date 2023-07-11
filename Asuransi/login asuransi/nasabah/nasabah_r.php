<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <!--style-->
  <style>
    html,
    body {
      display: grid;
      height: 100%;
      width: 100%;
      place-items: center;
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(asuransi2.jpg);
    }

    .content-table {
      opacity: 0.9;
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 0.9em;
      min-width: 400px;
      background-color: #d5dde3;
      border-color: #3a5ba0;
    }

    .content-table thead tr {
      background-color: #008B8B;
      color: aliceblue;
      text-align: left;
      font-weight: bold;
    }

    .content-table th,
    .content-table td {
      padding: 12px 15px;
    }

    .content-table tbody tr {
      border-bottom: 1px solid #3a5ba0;
    }

    .content-table tbody tr:nth-of-type(even) {
      background-color: #f3f3f3;
    }

    .content-table tbody tr:last-of-type {
      border-bottom: 1px solid #3a5ba0;
    }

    .button-32 {
      background-color: #FC766AFF;
      border-radius: 12px;
      color: whitesmoke;
      cursor: pointer;
      font-weight: bold;
      padding: 10px 15px;
      text-align: center;
      transition: 200ms;
      width: 100%;
      box-sizing: border-box;
      border: 0;
      font-size: 16px;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
    }

    .button-32:not(:disabled):hover,
    .button-32:not(:disabled):focus {
      outline: 0;
      background: #FC766AFF;
      box-shadow: 0 0 0 2px rgba(0, 0, 0, .2), 0 3px 8px 0 rgba(0, 0, 0, .15);
    }

    .button-32:disabled {
      filter: saturate(0.2) opacity(0.5);
      -webkit-filter: saturate(0.2) opacity(0.5);
      cursor: not-allowed;
    }

    .button-8 {
      background-color: #e1ecf4;
      border-radius: 3px;
      border: 1px solid #7aa7c7;
      box-shadow: rgba(255, 255, 255, .7) 0 1px 0 0 inset;
      box-sizing: border-box;
      color: #39739d;
      cursor: pointer;
      display: inline-block;
      font-family: -apple-system, system-ui, "Segoe UI", "Liberation Sans", sans-serif;
      font-size: 13px;
      font-weight: 400;
      line-height: 1.15385;
      margin: 0;
      outline: none;
      padding: 8px .8em;
      position: relative;
      text-align: center;
      text-decoration: none;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      vertical-align: baseline;
      white-space: nowrap;
    }

    .button-8:hover,
    .button-8:focus {
      background-color: #b3d3ea;
      color: #2c5777;
    }

    .button-8:focus {
      box-shadow: 0 0 0 4px rgba(0, 149, 255, .15);
    }

    .button-8:active {
      background-color: #a0c7e4;
      box-shadow: none;
      color: #2c5777;
    }
  </style>
</head>

<body>
  <h1 style="font-family: arial; color: #fff;">
    Data Nasabah</h1>
  <table border="1" class="content-table">
    <tr style="font-family: Courier New,monospace ;">
      <th>No.</th>
      <th>ID Nasabah</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
      <th>Petugas</th>
      <th>Jenis Polis</th>
    </tr>
    <?php
    include "koneksi.php";
    $no = 1;
    $ambildata = mysqli_query($koneksi, "select * from nasabah 
  INNER JOIN petugas ON nasabah.nip = petugas.nip
  INNER JOIN polis ON nasabah.no_polis = polis.no_polis");
    while ($tampil = mysqli_fetch_array($ambildata)) {
      echo "
    <tr>
    <td align='center'>$no</td>
    <td align='center'>$tampil[id_nasabah]</td>
    <td align='center'>$tampil[nama_nasabah]</td>
    <td align='center'>$tampil[jenis_kelamin_n]</td>
    <td align='center'>$tampil[alamat]</td>
    <td align='center'>$tampil[nama_petugas]</td>
    <td align='center'>$tampil[jenis_polis]</td>
    </tr>";
      $no++;
    }
    ?>
  </table>
</body>

<a href="../Admin.html">
  <button class="button-32" role="button">Go To Home</button>
</a>

<?php
if (isset($_GET['hapus'])) {

  mysqli_query($koneksi, "DELETE FROM nasabah WHERE id_nasabah='$_GET[hapus]'") or die(mysqli_error($koneksi));

  echo "<p><b> Data berhasil dihapus</b> </p>";
  echo "<meta http-equiv=refresh content=2;URL='nasabah_r.php'>";
}
?>

</html>