<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $no_polis = isset($_POST['no_polis']) && !empty($_POST['no_polis']) && $_POST['no_polis'] != 'auto' ? $_POST['no_polis'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $jenis_polis_p = isset($_POST['jenis_polis']) ? $_POST['jenis_polis'] : '';
   
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO polis VALUES (?, ?)');
    $stmt->execute([$no_polis, $jenis_polis_p]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="no_polis">No Polis</label>
        <label for="jenis_polis">Jenis Polis</label>
        <input type="text" name="no_polis" value="auto" id="no_polis">
        <input type="text" name="jenis_polis" id="jenis_polis">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>