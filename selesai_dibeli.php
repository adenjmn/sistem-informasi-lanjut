<!DOCTYPE html>
<html>
<head>
	<title>Kirim Gambar</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
	<p>Kirim gambar ke <?php echo $_GET['id']?></p>
<td colspan="4">Upload Gambar <input type="file" name="gambar2" required /> | 
<input type="submit" value="Upload" name="save"></td>
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
	move_uploaded_file($_FILES['gambar2']['tmp_name'], 'finale/'.$rand.'_'.$filename);
  // Simpan ke Database
  $sql = "insert into produk (gambar, username) values ('$upload', '".$_GET['id']."')";
  mysqli_query($koneksi, $sql);
  // Simpan di Folder Gambar
  
  echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>"; 
  header("location:pelanggan.php"); // redirects to all records page
 } 
?>
</body>
</html>