<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $nip = isset($_POST['nip']) && !empty($_POST['nip']) && $_POST['nip'] != 'auto' ? $_POST['nip'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama_petugas = isset($_POST['nama_petugas']) ? $_POST['nama_petugas'] : '';
    $jenis_kelamin_p = isset($_POST['jenis_kelamin_p']) ? $_POST['jenis_kelamin_p'] : '';
    $alamat_p = isset($_POST['alamat_p']) ? $_POST['alamat_p'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO petugas VALUES (?, ?, ?, ?)');
    $stmt->execute([$nip, $nama_petugas, $jenis_kelamin_p, $alamat_p]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="nip">NIP</label>
        <label for="nama_petugas">Nama Petugas</label>
        <input type="text" name="nip" value="auto" id="nip">
        <input type="text" name="nama_petugas" id="nama_petugas">
        <label for="jenis_kelamin_p">Jenis Kelamin</label>
        <label for="notelp">Alamat</label>
        <input type="text" name="jenis_kelamin_p" id="jenis_kelamin_p">
        <input type="text" name="alamat_p" id="alamat_p">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>