<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['nip'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $nip = isset($_POST['nip']) ? $_POST['nip'] : NULL;
        $nama_petugas = isset($_POST['nama_petugas']) ? $_POST['nama_petugas'] : '';
        $jenis_kelamin_p = isset($_POST['jenis_kelamin_p']) ? $_POST['jenis_kelamin_p'] : '';
        $alamat_p = isset($_POST['alamat_p']) ? $_POST['alamat_p'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE petugas SET nip = ?, nama_petugas = ?, jenis_kelamin_p = ?, alamat_p = ? WHERE nip = ?');
        $stmt->execute([$nip, $nama_petugas, $jenis_kelamin_p, $alamat_p, $_GET['nip']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM petugas WHERE nip = ?');
    $stmt->execute([$_GET['nip']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Updated Successfully!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['nip']?></h2>
    <form action="update.php?nip=<?=$contact['nip']?>" method="post">
        <label for="nip">NIP</label>
        <input type="text" name="nip" value="<?=$contact['nip']?>" id="nip">
        <label for="nama_petugas">Nama Petugas</label>
        <input type="text" name="nama_petugas" value="<?=$contact['nama_petugas']?>" id="nama_petugas">
        <label for="jenis_kelamin_p">Jenis Kelamin Petugas</label>
        <input type="text" name="jenis_kelamin_p" value="<?=$contact['jenis_kelamin_p']?>" id="jenis_kelamin_p">
        <label for="alamat_p">Alamat Petugas</label>
        <input type="text" name="alamat_p" value="<?=$contact['alamat_p']?>" id="title">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>