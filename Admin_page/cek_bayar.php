<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style_admin.css">
	<!-- <link rel="stylesheet" href="../css/style-cekout.css"> -->
	<!-- <link rel="stylesheet" href="css/style-kirim.css"> -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
	<title>KIRIM DESAIN - ADMIN - JAZA DESIGN</title>
</head>
    <header>
        <div class="container">
          <h1 class="logo"></h1>
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
	

</body>
<div class="container"></div>
<table id="tabel-data" class="table">
    <thead>
        <tr>
            <th>KONFIRMASI PEMBAYARAN</th>
        </tr>
    </thead>
    <tbody>
    <?php    
        include '../koneksi.php';
        $confirm = $_GET['id'];
        $query = "SELECT * FROM pesanan WHERE id_pesanan='$confirm'";
        $pesanan = mysqli_query($koneksi,$query);

        // $pesanan = mysqli_query($koneksi,$sql);
        while($row = mysqli_fetch_array($pesanan))
        {
            echo "<tr>
            <td><img src='../bukti/".$row['bukti_bayar']."'></td>";
        }
        ?>

        
        <?php
    
    ?>
    </tbody>

</script>

</table>
<?php    
        include '../koneksi.php';
        $confirm = $_GET['id'];
        $query = "SELECT * FROM pesanan WHERE id_pesanan='$confirm'";
        $pesanan = mysqli_query($koneksi,$query);

        // $pesanan = mysqli_query($koneksi,$sql);
        while($row = mysqli_fetch_array($pesanan))
        {
            echo "
            <a href='konfirmasi_pesanan.php?id=".$row['id_pesanan']."'>Konfirmasi pembayaran</a>";
        }
        ?>

        
        <?php
    
    ?>


</html>