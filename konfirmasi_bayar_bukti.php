<!DOCTYPE html>
<html>
<head>
	<title>Konfirmasi Pembayaran</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
	<?php 
	include 'koneksi.php';
	$confirm = $_GET['id'];
	$query = "SELECT * FROM pesanan WHERE id_pesanan='$confirm'";
	$pesanan = mysqli_query($koneksi,$query);
	while($row = mysqli_fetch_array($pesanan)){
		echo "<h1>Harga yang harus dibayar Rp" .$row['harga']."</h1>";
	}
	?>
	<input type="text" name="keterangan" id="keterangan" required="required" autofocus placeholder="Keterangan Bayar" class="form-order">
	<input type="file" name="gambar2" required /></td>
	<input type="submit" value="Upload" name="save">
</form>
<?php
include 'koneksi.php';
$confirm = $_GET['id'];
 if (isset($_POST['save'])){
	 $rand = rand();
	 $ekstensi =  array('png','jpg','jpeg','gif');
	 $filename = $_FILES['gambar2']['name'];
	 $ukuran = $_FILES['gambar2']['size'];
	 $ext = pathinfo($filename, PATHINFO_EXTENSION);
	 $upload = $rand.'_'.$filename;
	 move_uploaded_file($_FILES['gambar2']['tmp_name'], 'bukti/'.$_GET['username'].''.$filename);
  	// Simpan ke Database

 	// $sql1 = "insert into produk (gambar, username) values ('$upload', '".$_GET['id']."')";
 	// mysqli_query($koneksi, $sql1);
	 $keterangan =$_POST['keterangan'];
 	$sql_bukti = "UPDATE pesanan SET bukti_bayar='$filename',keterangan_bayar='$keterangan' WHERE id_pesanan='$confirm'";
	mysqli_query($koneksi,$sql_bukti);
  // Simpan di Folder Gambar
  
  echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>"; 
  header("location:keranjang.php"); // redirects to all records page
 } 
?>
</body>
</html>