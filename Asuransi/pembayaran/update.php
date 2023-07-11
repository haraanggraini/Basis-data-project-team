<?php 
$koneksi = mysqli_connect("localhost", "root", "", "asuransi");
$data = $_GET["id_pembayaran"];
$query = mysqli_query($koneksi, "SELECT * FROM pembayaran 
INNER JOIN nasabah ON pembayaran.id_nasabah = nasabah.id_nasabah 
INNER JOIN petugas ON pembayaran.nip = petugas.nip 
INNER JOIN polis ON pembayaran.no_polis = polis.no_polis 
INNER JOIN tb_asuransi ON pembayaran.kode_asuransi = tb_asuransi.kode_asuransi
WHERE id_pembayaran='$data' ");
$hasil = mysqli_fetch_array($query);

if(isset($_POST["simpan"])){
    $id_pembayaran       =$_POST["id_pembayaran"];
    $kode_asuransi       =$_POST["kode_asuransi"];
    $id_nasabah          =$_POST["id_nasabah"];
    $nip                 =$_POST["nip"];
    $no_polis            =$_POST["no_polis"];
    $nominal_bayar       =$_POST["nominal_bayar"];
    $tanggal_pembayaran  =$_POST["tanggal_pembayaran"];

    mysqli_query($koneksi, "UPDATE pembayaran SET 
    id_pembayaran  = '$id_pembayaran ',
    kode_asuransi  = '$kode_asuransi ', 
    id_nasabah  = '$id_nasabah ', 
    nip = '$nip', 
    no_polis  = '$no_polis ', 
    nominal_bayar = '$nominal_bayar',
    tanggal_pembayaran  = '$tanggal_pembayaran ' 
    WHERE id_pembayaran = '$data' ");

    echo "
        <script>
            alert('Data Berhasil Diperbarui!');
            window.location = 'read.php';
        </script>
    ";
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--STYLE CSS-->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(asuransi2.jpg);
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ::selection {
            background: #4279fa;
            color: #fff;
        }

        .wrapper {
            overflow: hidden;
            width: 500px;
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
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
    </style>

</head>

<body>

    <div class="wrapper">
        <center>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;margin-bottom: 20px; color:#6f87b9;">Edit Data

            </p>
        </center>
        <a href="read.php">
            <button class="button-32">Kembali</button>
        </a>
<form action="" method="POST">
        <div class="mb-3 row">
            <label for="id_pembayaran" class="col-sm-2 col-form-label">Id Pembayaran</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="id_pembayaran" name="id_pembayaran"
                value="<?php echo $hasil['id_pembayaran'];?>">
            </div>
        </div>
        <div class="mb-3 row">
            <tr>
                <td>Jenis Asuransi</td>
                <div class="col-sm-10">
                    <td><select name="kode_asuransi">
                        <?php
                include "koneksi.php";
                echo "<option value=$hasil[kode_asuransi]>$hasil[jenis_asuransi]</option>";
                $query = mysqli_query($koneksi,"SELECT * FROM tb_asuransi") or die (mysqli_error($koneksi));
                while($hasil = mysqli_fetch_array($query)){
                    echo "<option value=$hasil[kode_asuransi]> $hasil[jenis_asuransi] </option>";
                }
                ?>
                </select>
            </tr>
        </div>
        <div class="mb-3 row">
            <tr>
                <td>Nama Nasabah</td>
                <div class="col-sm-10">
                    <td><select name="id_nasabah">
                        <?php
                include "koneksi.php";
                echo "<option value=$hasil[id_nasabah]>$hasil[nama_nasabah]</option>";
                $query = mysqli_query($koneksi,"SELECT * FROM nasabah") or die (mysqli_error($koneksi));
                while($hasil = mysqli_fetch_array($query)){
                    echo "<option value=$hasil[id_nasabah]> $hasil[nama_nasabah] </option>";
                }
                ?>
                </select>
            </tr>
        </div>
        <div class="mb-3 row">
            <tr>
                <td>Nama Petugas</td>
                <div class="col-sm-10">
                    <td><select name="nip">
                        <?php
                include "koneksi.php";
                echo "<option value=$hasil[nip]>$hasil[nama_petugas]</option>";
                $query = mysqli_query($koneksi,"SELECT * FROM petugas") or die (mysqli_error($koneksi));
                while($hasil = mysqli_fetch_array($query)){
                    echo "<option value=$hasil[nip]> $hasil[nama_petugas] </option>";
                }
                ?>
                </select>
            </tr>
        </div>
        <div class="mb-3 row">
            <tr>
                <td>Jenis Polis</td>
                <div class="col-sm-10">
            <td><select name="no_polis">
                <?php
                include "koneksi.php";
                echo "<option value=$hasil[no_polis]>$hasil[jenis_polis]</option>";
                $query = mysqli_query($koneksi,"SELECT * FROM polis") or die (mysqli_error($koneksi));
                while($hasil = mysqli_fetch_array($query)){
                    echo "<option value=$hasil[no_polis]> $hasil[jenis_polis] </option>";
                }
                ?>
                </select>
        </tr>
    </div>
    <div class="mb-3 row">
        <label for="nominal_bayar" class="col-sm-2 col-form-label">Nominal Pembayaran</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="nominal_bayar" name="nominal_bayar"
            value="<?php echo $hasil['nominal_bayar'];?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_pembayaran" class="col-sm-2 col-form-label">Tanggal pembayaran</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran"
            value="<?php echo $hasil['tanggal_pembayaran'];?>">
        </div>
    </div>
    <div class="col-12">
    <tr>
            <td></td>
            </br>
                    <td><input class="button-32" type="submit" value="Simpan" name="simpan"></td>
        </tr>
    </div>

</form>

</div>
</body>
</html>