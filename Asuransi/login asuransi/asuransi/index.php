<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($conn, 'SELECT * FROM tb_asuransi');
?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Asuransi</title>
</head>

<body>
    <br>
    <h1><p style="font-family: Gabriola" align="center" class="p">Asuransi</h1>
    <a class='btn btn-warning' href="add.php"><strong> tambahkan asuransi baru</strong></a><br /><br />
    <table class="table table-striped;">
        <tr style="font-family: Gabriola; font-size : 20px;" >
            <th>No</th>
            <th>Kode Asuransi</th>
            <th>Jenis Asuransi</th>
            <th>Jangka Waktu</th>
            <th>Biaya Asuransi</th>
            <th>Action</th>
        </tr>
        <?php
        include ("config.php");
        $no = 1 ;
        while ($asuransi_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $no. "</td>";
            echo "<td>" . $asuransi_data['kode_asuransi'] . "</td>";
            echo "<td>" . $asuransi_data['jenis_asuransi'] . "</td>";
            echo "<td>" . $asuransi_data['jangka_waktu'] . "</td>";
            echo "<td>" . "Rp " . number_format($asuransi_data['biaya_asuransi'],2,',','.') . "</td>";
            echo "<td>
                    <a class='btn btn-danger' href='delete.php?kode_asuransi=$asuransi_data[kode_asuransi]'>Delete</a>
                  </td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>
    <a class="btn" style="background-color:#FC766AFF ;color:whitesmoke;" href="../Admin.html">Go to Home</a>
</body>

</html>