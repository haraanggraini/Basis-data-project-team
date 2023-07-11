<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['no_polis'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $no_polis = isset($_POST['no_polis']) ? $_POST['no_polis'] : NULL;
        $jenis_polis = isset($_POST['jenis_polis']) ? $_POST['jenis_polis'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE polis SET no_polis = ?, jenis_polis = ? WHERE no_polis = ?');
        $stmt->execute([$no_polis, $jenis_polis, $_GET['no_polis']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM polis WHERE no_polis = ?');
    $stmt->execute([$_GET['no_polis']]);
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
	<h2>Update Contact #<?=$contact['no_polis']?></h2>
    <form action="update.php?no_polis=<?=$contact['no_polis']?>" method="post">
        <label for="no_polis">No Polis</label>
        <input type="text" name="no_polis" value="<?=$contact['no_polis']?>" id="no_polis">
        <label for="jenis_polis">Jenis Polis</label>
        <input type="text" name="jenis_polis" value="<?=$contact['jenis_polis']?>" id="jenis_polis">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>