<?php 
session_start();
require 'koneksi.php';

if($_SESSION['level']!="user"){
	header("location:index.php?pesan=gagal");
}

if(isset($_POST['pesan'])){

    // input data 
    $username = $_SESSION['username'];
    $jenis = $_POST['jenis'];
    $tujuan = $_POST['tujuan'];
    $warna = $_POST['warna'];
    $gambar1 = $_POST['gambar1'];
    
    $waktu = $_POST['waktu'];
    $keterangan = $_POST['keterangan'];
    $status_pembayaran ="Belum bayar";


    $harga="";
    if ($jenis == "Baner") {
    	$harga = 75000;
    }elseif ($jenis == "Logo") {
    	$harga = 125000;
    }elseif ($jenis == "Instagram") {
    	$harga = 50000;
    }
    $t=time();
// echo($t . "<br>");
	$tgl_pesan = date("Y-m-d",$t);

	$rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$filename = $_FILES['gambar1']['name'];
	$ukuran = $_FILES['gambar1']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$upload = $rand.'_'.$filename;
	move_uploaded_file($_FILES['gambar1']['tmp_name'], 'gambar/'.$rand.'_'.$filename);

	$bukti_bayar ="";
	$keterangan_bayar="";
    // menginput data ke database
    mysqli_query($koneksi,"insert into pesanan values('','$username','$jenis','$tujuan', '$warna', '$upload','$waktu','$keterangan','$tgl_pesan','$status_pembayaran','$harga','$bukti_bayar','$keterangan_bayar')");

    // maka alihkan ke halaman login
    header("Location: halaman_user.php");
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Pesan - Jaza Design</title>
	<link rel="stylesheet" type="text/css" href="css/style-pesan.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<header>
    <div class="container">
      <h1 class="logo"></h1>
      <img src="img/logo.png" class="brand">

      <nav>
        <ul>
          <li><a href="pesan.php">Pesan Desain</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
          <li><a href="cek_saya.php">Desain Saya</a></li>
          <li><a href="logout.php" style="color: black">Keluar</a></li>
        </ul>
      </nav>
    </div>
  </header>
<body>
	
	<div class="container">
		<div class="gambar"></div>
		<div class="content cf">
			<div class="main">

				<h1>Data Pesanan</h1>
				<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>

				<form action="" method="post" enctype="multipart/form-data">
					<p class="tulisan-pesanan">Silakan isi sesuai yang anda request!</p>
						<label for="jenis">Mau Desain Apa :</label>
						<select name="jenis" id="jenis" required="required" class="form-order">
							<option value="Baner">Baner (Rp.75.000)</option>
							<option value="Logo">Logo (Rp.125.000)</option>
							<option value="Instagram">Feed Instagram (Rp.50.000/post)</option>
						</select>
					
					
						<input type="text" name="tujuan" id="tujuan"
						required="required" autofocus placeholder="Tujuan Pembuatan" class="form-order">
					
						<input type="text" name="warna" id="warna"
						required="required" autofocus placeholder="Rekomendasi Warna" class="form-order">
					
						<label for="gambar">Referensi Desain (optional)</label>
						<input type="file" name="gambar1" id="gambar1" class="form-order">

						<input type="text" name="waktu" id="Estimasi waktu"
						required="required" autofocus placeholder="Estimasi waktu" class="form-order">
					
						<input type="textarea" name="keterangan" id="keterangan" autofocus placeholder="keterangan" class="form-order, ket">
				
						<button type="submit" name="pesan" class="tombol-submit">Submit</button>
			
				</form>

			</div>
		</div>
	</div>
</body>
</html>