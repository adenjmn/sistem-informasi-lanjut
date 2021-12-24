<?php
	// session_start();
	include '../koneksi.php'; // Using database connection file here
// echo $_GET['link'];
	$confirm = $_GET['id']; // get id through query string
	// $status_pembayaran = "Sudah";

	$sql = "UPDATE pesanan SET status_pembayaran='Sudah' WHERE id_pesanan='$confirm'";
	mysqli_query($koneksi,$sql);

	header("location:pelanggan.php"); // redirects to all records page
	// mysqli_close($koneksi);
?>