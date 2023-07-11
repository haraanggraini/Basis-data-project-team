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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;margin-bottom: 20px; color:#6f87b9;">Input Data

            </p>
        </center>

<form action="" method="POST">
        <div class="mb-3 row">
            <label for="id_pembayaran" class="col-sm-2 col-form-label">Id Pembayaran</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="id_pembayaran" name="id_pembayaran"
                value="<?php echo $id_pembayaran?>">
            </div>
        </div>
        <div class="mb-3 row">
            <tr>
                <label for="kode_asuransi" class="col-sm-2 col-form-label">Jenis Asuransi</label>
                <div class="col-sm-10">
                    <td><select name="kode_asuransi">
                        <option>---</option>
                        <?php
                    include "koneksi.php";
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_asuransi") or die (mysqli_error($koneksi));
                    while($data = mysqli_fetch_array($query)){
                        echo "<option value=$data[kode_asuransi]> $data[jenis_asuransi] </option>";
                    }
                    ?>
                    </select>
                </tr>
            </div>
            <div class="mb-3 row">
                <tr>
                    <label for="id_nasabah" class="col-sm-2 col-form-label">Nama Nasabah</label>
                    <div class="col-sm-10">
                        <td><select name="id_nasabah">
                            <option>---</option>
                            <?php
                include "koneksi.php";
                $query = mysqli_query($koneksi,"SELECT * FROM nasabah") or die (mysqli_error($koneksi));
                while($data = mysqli_fetch_array($query)){
                    echo "<option value=$data[id_nasabah]> $data[nama_nasabah] </option>";
                }
                ?>
                </select>
            </tr>
        </div>
        <div class="mb-3 row">
            <tr>
                <label for="nip" class="col-sm-2 col-form-label">Nama Petugas</label>
                <div class="col-sm-10">
                    <td><select name="nip">
                        <option>---</option>
                        <?php
                include "koneksi.php";
                $query = mysqli_query($koneksi,"SELECT * FROM petugas") or die (mysqli_error($koneksi));
                while($data = mysqli_fetch_array($query)){
                    echo "<option value=$data[nip]> $data[nama_petugas] </option>";
                }
                ?>
                </select>
            </tr>
        </div>
        <div class="mb-3 row">
            <tr>
                <label for="no_polis" class="col-sm-2 col-form-label">Jenis Polis</label>
                <div class="col-sm-10">
                <td><select name="no_polis">
                <option>---</option>
                <?php
                include "koneksi.php";
                $query = mysqli_query($koneksi,"SELECT * FROM polis") or die (mysqli_error($koneksi));
                while($data = mysqli_fetch_array($query)){
                    echo "<option value=$data[no_polis]> $data[jenis_polis] </option>";
                }
                ?>
                </select>
        </tr>
    </div>
    <div class="mb-3 row">
        <label for="nominal_bayar" class="col-sm-2 col-form-label">Nominal Pembayaran</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="nominal_bayar" name="nominal_bayar"
                value="<?php echo $nominal_bayar ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_bayar" class="col-sm-2 col-form-label">Tanggal pembayaran</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran"
                value="<?php echo $tanggal_pembayaran ?>">
        </div>
    </div>
    <div class="col-12">
    <tr>
            <td></td>
            <br>
            <td><input class="button-32" type="submit" value="Simpan" name="simpan"></td>
        </tr>
    </div>

</form>
<br>
<a href="../Dashboard.html">
            <button class="button-32">Go To Home</button>
        </a>
        <br>


<?php
include'koneksi.php';
if(isset($_POST["simpan"])){
    $kode_asuransi      =$_POST["kode_asuransi"];
    $id_nasabah         =$_POST["id_nasabah"];
    $nip                =$_POST["nip"];
    $no_polis           =$_POST["no_polis"];
    $id_pembayaran      =$_POST["id_pembayaran"];
    $nominal_bayar      =$_POST["nominal_bayar"];
    $tanggal_pembayaran =$_POST["tanggal_pembayaran"];

    $input = "INSERT INTO pembayaran values('$kode_asuransi','$id_nasabah','$nip','$no_polis','$id_pembayaran','$nominal_bayar','$tanggal_pembayaran')";
    mysqli_query($koneksi,$input);
    echo "<script>alert('Data telah tersimpan')</script>";
}
?>
</body>
</html>