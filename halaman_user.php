<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/jaza.css">
  <!-- <link rel="stylesheet" href="css/style.css"> -->
	<title>Jaza Desain</title>
</head>
<header>
    <div class="naviga">
      <!-- <h1 class="logo"></h1> -->
      <img src="img/logo.png" class="brand">

      <nav>
        <ul>
          <li><a href="pesan.php">Pesan Desain</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
          <li><a href="cek_saya.php">Galeri Saya</a></li>
          <li><a href="logout.php">KELUAR</a></li>
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
	<h1 style="text-align: center; padding-top: 10px;">Selamat datang di Jaza Desain</h1>
	
  <div class="container">
    <div class="card">
      <img src="img/kuliner sehat ibu Nina.jpg">
      <div class="card__head">Banner</div>
    </div>
    <div class="card">
      <img src="img/poster 1080.png">
      <div class="card__head">Logo</div>
    </div>
    <div class="card">
      <img src="img/Ayo Vaksin A.jpg">
      <div class="card__head">Feed Instagram</div>
    </div>
  </div>

</body>
</html>