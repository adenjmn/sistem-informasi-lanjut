<!DOCTYPE html>
<html>
<head>
	<title>Kirim Gambar</title>
	<link rel="stylesheet" href="../css/style_admin.css">
</head>
<body>
<a href="pelanggan.php" class="previous">&laquo; Kembali</a>
<form method="post" enctype="multipart/form-data" style="text-align: center;">
	<p>Kirim gambar ke <?php echo $_GET['id']?></p>
<td colspan="4">Upload Gambar <input type="file" name="gambar2" required /> | 
<input type="submit" value="Upload" name="save" id="btn"></td>
</form>
<?php
include '../koneksi.php';
session_start();
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:../index.php?pesan=access");
}


$confirm = $_GET['id'];
 if (isset($_POST['save'])){
	 $rand = rand();
	 $ekstensi =  array('png','jpg','jpeg','gif');
	 $filename = $_FILES['gambar2']['name'];
	 $ukuran = $_FILES['gambar2']['size'];
	 $ext = pathinfo($filename, PATHINFO_EXTENSION);
	 $upload = $rand.'_'.$filename;
	 move_uploaded_file($_FILES['gambar2']['tmp_name'], '../finale/'.$_GET['username'].''.$filename);
  	// Simpan ke Database

 	$sql1 = "insert into produk (gambar, username) values ('$filename', '".$_GET['id']."')";
 	mysqli_query($koneksi, $sql1);
 // 	$sql2 = "UPDATE pesanan SET status_pembayaran='SELESAI' WHERE id_pesanan='$confirm'";
	// mysqli_query($koneksi,$sql2);
  // Simpan di Folder Gambar
  
  echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>"; 
  header("location:pelanggan.php"); // redirects to all records page
 } 
?>

</body>
</html>