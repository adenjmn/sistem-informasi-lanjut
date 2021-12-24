<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/style_admin.css">
	<title>ADMIN - JAZA DESIGN</title>
</head>
<header>
    <div class="container">
      <!-- <h1 class="logo"></h1> -->
      <img src="../img/logo.png" class="brand">

      <nav>
        <ul>
          <li><a href="pelanggan.php">PELANGGAN</a></li>
          <li><a href="../logout.php">KELUAR</a></li>
        </ul>
      </nav>
    </div>
  </header>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']!="admin"){
		header("location:../index.php?pesan=access");
	}

	?>
	<div class="container"><h1>Halaman Admin</h1></div>
	

	<p style="text-align: center;">Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	
	<br/>
	<br/>

</body>
</html>