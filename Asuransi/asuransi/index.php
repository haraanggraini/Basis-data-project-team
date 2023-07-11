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

    <!-- Style CSS -->
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: arial;
            box-sizing: border-box;
        }
        h1{
            color: aliceblue;
            font-family: arial;
            padding-top: 30px;
        }
        body{
            height: 100vh;
            display: grid;
            place-items: center;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(asuransi2.jpg);
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
        table{
            width: 1000px;
            box-shadow: -1px 12px 12px -6px rgba(0,0,0,0.5);
        }
        table, td, th{
            padding: 20px;
            border: 1px solid grey;
            border-collapse: collapse;
            text-align: center;
            cursor: pointer;
        }
        td{
            font-size: 18px;
        }
        th{
            background-color: #6e90f7;
            color: white;
        }
        tr:nth-child(even){
            background-color: lightblue;
        }
        tr:nth-child(even):hover{
            background-color: dodgerblue;
            color: white;
            transform: scale(1.1);
            transition: 300ms ease-in;
        }
        tr:nth-child(odd){
            background-color: whitesmoke;
        }
        tr:nth-child(odd):hover{
            background-color: gray;
            color: white;
            transform: scale(1.1);
            transition: 300ms ease-in;
        }
        .btn{
        display: inline-block;
        background-color: #FC766AFF;
        color: #fff;
        padding: 8px 30px;
        margin: 30px 0;
        border-radius: 30px;
        border-color: #6e90f7;
        transition: background 0.5s;
        }
        .btn:hover{
            background: lightblue;
            color: black;
        }
    </style>

    <title>Asuransi</title>
</head>

<body>
    <h1>JENIS ASURANSI YANG DITAWARKAN</h1>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Asuransi</th>
            <th>Jenis Asuransi</th>
            <th>Jangka Waktu</th>
            <th>Biaya Asuransi</th>
        </tr>
        </thead>
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
            echo "</tr>";
            $no++;
        }
        ?>
    </table>
    <a href="../Dashboard.html">
    <button class="btn">Go To Home</button>
</a>
</body>

</html>