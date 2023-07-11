<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['no_polis'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM polis WHERE no_polis = ?');
    $stmt->execute([$_GET['no_polis']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM polis WHERE no_polis = ?');
            $stmt->execute([$_GET['no_polis']]);
            $msg = 'You have deleted the contact!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No no_polis specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Contact #<?=$contact['no_polis']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$contact['no_polis']?>?</p>
    <div class="yesno">
        <a href="delete.php?no_polis=<?=$contact['no_polis']?>&confirm=yes">Yes</a>
        <a href="delete.php?no_polis=<?=$contact['no_polis']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>