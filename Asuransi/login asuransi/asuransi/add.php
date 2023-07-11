<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add</title>
    <style>
        body{
            background-color: #DBFFFE;
        }
    </style>
</head>

<body class='body'>
    
    <br /><br />
    <h3><p style="font-family: Gabriola" align="center">✦ Add a new type of insurance ✦</h3>
    <h3><p style="font-family: Gabriola" align="center">Please enter the insurance data that will be used !!!</h3>
    <br>
    <form action="add.php" method="post" name="form1">
        <table class="table table-striped">
            <tr>
                <td>Kode Asuransi</td>
                <td><input type="text" name="kode_asuransi"></td>
            </tr>
            <tr>
                <td>Jenis Asuransi</td>
                <td><input type="text" name="jenis_asuransi"></td>  
            </tr>
            <tr>
                <td>Jangka Waktu</td>
                <td><input type="date" name="jangka_waktu"></td>
            </tr>
            <tr>
                <td>Biaya Asuransi</td>
                <td><input type="text" name="biaya_asuransi"></td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <button type="submit" class="btn btn-primary" name="Submit" value="Add">Add</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $kode_asuransi = $_POST['kode_asuransi'];
        $jenis_asuransi = $_POST['jenis_asuransi'];
        $jangka_waktu = $_POST['jangka_waktu'];
        $biaya_asuransi = $_POST['biaya_asuransi'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO tb_asuransi(kode_asuransi, jenis_asuransi, jangka_waktu, biaya_asuransi) 
                VALUES('$kode_asuransi','$jenis_asuransi','$jangka_waktu','$biaya_asuransi')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'></a>";
    }
    ?>
    <br>
    <a class="btn btn-success" href="index.php">Go to Home</a>
</body>

</html>