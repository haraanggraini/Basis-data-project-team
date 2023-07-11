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
<h1 style="font-family: arial; color: #fff;">Data Pembayaran</h1>
    <div class="card-body">
        <table class="content-table" border="1">
                        <tr style="font-family: Courier New,monospace ;">
                            <th scope="col">No</th>
                            <th scope="col">Id Pembayaran</th>
                            <th scope="col">Asuransi</th>
                            <th scope="col">Nama Nasabah</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">Jenis Polis</th>
                            <th scope="col">Nominal Pembayaran</th>
                            <th scope="col">Tanggal Pembayaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        
                        <?php
                    include "koneksi.php";
                    $no = 1;
                    $ambildata = mysqli_query($koneksi,"SELECT * FROM pembayaran 
                    INNER JOIN nasabah ON pembayaran.id_nasabah = nasabah.id_nasabah 
                    INNER JOIN petugas ON pembayaran.nip = petugas.nip 
                    INNER JOIN polis ON pembayaran.no_polis = polis.no_polis 
                    INNER JOIN tb_asuransi ON pembayaran.kode_asuransi = tb_asuransi.kode_asuransi");
                    while ($data = mysqli_fetch_array($ambildata)){
                        echo "
                        <tr>
                        <td align='center'>$no</td>
                        <td align='center'>$data[id_pembayaran]</td>
                        <td align='center'>$data[jenis_asuransi]</td>
                        <td align='center'>$data[nama_nasabah]</td>
                        <td align='center'>$data[nama_petugas]</td>
                        <td align='center'>$data[jenis_polis]</td>
                        <td align='center'>$data[nominal_bayar]</td>
                        <td align='center'>$data[tanggal_pembayaran]</td>
                        <td align='center'>
                        <a href = 'update.php?id_pembayaran=$data[id_pembayaran]'>
                        <input class='button-8' type='button' value='Edit'>
                        </a>
                        <a href ='?hapus=$data[id_pembayaran]' onClick=\"return confirm('Anda yakin menghapus data ini?');\">
                        <input class='button-8' type='button' value='Hapus'>
                        </a>
                        </td>
                        </tr>";
                        $no++;
                        };
                        ?>
</table>
</div>

<a href="../Admin.html">
    <button class="button-32" role="button">Go To Home</button>
</a>


<?php
if(isset($_GET['hapus'])){
    
  mysqli_query($koneksi,"DELETE FROM pembayaran WHERE id_pembayaran='$_GET[hapus]'") or die (mysqli_error($koneksi));
  
  echo "<p><b> Data berhasil dihapus</b> </p>";
  echo "<meta http-equiv=refresh content=2;URL='read.php'>";
  
}
?>

</body>
</html>