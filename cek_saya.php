<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="css/style-cekout.css"> -->
	<!-- <link rel="stylesheet" href="css/style-kirim.css"> -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
	<title>Galeri - Jaza Design</title>
</head>
<header>
    <div class="container">
      <h1 class="logo"></h1>
      <img src="img/logo.png" class="brand">

      <nav>
        <ul>
          <li><a href="pesan.php">Pesan Desain</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
          <li><a href="cek_saya.php">Galeri Saya</a></li>
          <li><a href="logout.php" style="color: black">Keluar</a></li>
        </ul>
      </nav>
    </div>
  </header>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']!="user"){
		header("location:index.php?pesan=gagal");
	}

	?>
	

</body>
<div class="container" style="text-align: center; font-size: 16px;">
  <h1>GALERI SAYA</h1>
  <hr>
    <?php    
        include 'koneksi.php';
        $confirm = $_SESSION['username'];
        $query = "SELECT * FROM produk WHERE username='$confirm'";
        $produk = mysqli_query($koneksi,$query);

        // $pesanan = mysqli_query($koneksi,$sql);
        
       
        while($row = mysqli_fetch_array($produk))
        {
            echo "<tr style='text-align: center;'>
            <td><img src='finale/".$row['gambar']."' class='galeri_img'></td>";
            ?>
            <?php echo "<p>ID DESIGN :".$row['id_produk'].""; ?></p>
            <?php 
        }
    
    ?>
    
</html>