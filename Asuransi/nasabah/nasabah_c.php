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
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(asuransi2.jpg);
            width: 100%;
            min-height: 100vh;
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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;margin-bottom: 20px; color:#6f87b9;">Data Nasabah

            </p>
        </center>

        <form action="" method="post">
            <table>
                <tr>
                    <td width="100">ID Nasabah</td>
                    <td><input type="number" name="id_nasabah"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama_nasabah" ></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><select name="jenis_kelamin_n" id="">
                            <option value="">---</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td>Petugas</td>
                    <td><select name="nip">
                            <option>---</option>
                            <?php
                            include "koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM petugas") or die(mysqli_error($koneksi));
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value=$data[nip]> $data[nama_petugas] </option>";
                            }
                            ?>
                        </select>
                </tr>
                <tr>
                <tr>
                    <td>Jenis Polis</td>
                    <td><select name="no_polis">
                            <option>---</option>
                            <?php
                            include "koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM polis") or die(mysqli_error($koneksi));
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value=$data[no_polis]> $data[jenis_polis] </option>";
                            }
                            ?>
                        </select>
                </tr>



            </table>
            <tr>
                </br>
                <td></td>
                <td><input class="button-32" type="submit" value="Daftar" name="proses"></td>
            </tr>
        </form>
        <a href="../Dashboard.html">
                <button class="button-32" role="button" style="margin-top: 10px ;">Go To Home</button>
            </a>

</body>
        <?php

        if (isset($_POST['proses'])) {

            mysqli_query($koneksi, "INSERT INTO nasabah SET
    id_nasabah = '$_POST[id_nasabah]',
    nama_nasabah = '$_POST[nama_nasabah]',
    jenis_kelamin_n = '$_POST[jenis_kelamin_n]',
    alamat = '$_POST[alamat]',
    nip = '$_POST[nip]',
    no_polis = '$_POST[no_polis]'") or die(mysqli_error($koneksi));

            echo "<script>alert('You have successfully')</script>";
        }

        ?>
    </div>


</html>