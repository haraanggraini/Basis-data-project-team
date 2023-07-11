<?php
	// include database connection file
	include_once("config.php");
	 
	// Get id from URL to delete that user
	$asuransi_data = $_GET['kode_asuransi'];
	 
	// Delete user row from table based on given id
	$result = mysqli_query($conn, "DELETE FROM tb_asuransi WHERE kode_asuransi=$asuransi_data");
	 
	// After delete redirect to Home, so that latest user list will be displayed.
	header("Location:index.php");
?>