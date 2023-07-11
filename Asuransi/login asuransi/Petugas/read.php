<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 10;


// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM petugas ORDER BY nip LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM petugas')->fetchColumn();
?>


<?=template_header('Read')?>

<div class="content read">
	<h2>Petugas Asuransi</h2>
    <a href="create.php">
        <button style="background-color:green;color:white;">Tambah Petugas</button>
    </a>
	<table>
        <thead>
            <tr>
                <td>NIP</td>
                <td>Nama Petugas</td>
                <td>Jenis_kelamin</td>
                <td>Alamat</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['nip']?></td>
                <td><?=$contact['nama_petugas']?></td>
                <td><?=$contact['jenis_kelamin_p']?></td>
                <td><?=$contact['alamat_p']?></td>
                <td class="actions">
                    <a href="update.php?nip=<?=$contact['nip']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?nip=<?=$contact['nip']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>