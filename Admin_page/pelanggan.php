<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/style_admin.css">
    <!-- <link rel="stylesheet" href="../css/style-kirim.css"> -->
	<!-- <link rel="stylesheet" href="../css/style-pesan.css"> -->
	
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
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=access");
	}

	?>
	

</body>
<div class="container">
    <h1>ADMIN</h1>
    <p style="text-align: center;">Data pemesanan pelanggan</p>
</div>
<a href="halaman_admin.php" class="previous">&laquo; Kembali</a>
<table id="tabel-data" class="table">
    <thead>
        <tr>
            <th>Contoh</th>
            <th>ID Pemesanan</th>
            <th>Jenis</th>
            <th>Tujuan</th>
            <th>Warna</th>
            <th>Waktu</th>
            <th>Status Pembayaran</th>
            <th>Konfirmasi Pembayaran</th>
            
        </tr>
    </thead>
    <tbody style="text-align: center;">
    <?php    
        include '../koneksi.php';
        $query = "SELECT * FROM pesanan";
        $pesanan = mysqli_query($koneksi,$query);

        // $pesanan = mysqli_query($koneksi,$sql);
        while($row = mysqli_fetch_array($pesanan))
        {
            echo "<tr>
            <td><img src='../gambar/".$row['gambar1']."' class='contoh_img'></td>
            <td>".$row['id_pesanan']."</td>
            <td>".$row['jenis']."</td>
            <td>".$row['tujuan']."</td>
            <td>".$row['warna']."</td>
            <td>".$row['waktu']."</td>
            <td>".$row['status_pembayaran']."</td>";

        if ($row['status_pembayaran']=='Belum bayar') {
            ?>
            <td> <a href="cek_bayar.php?id=<?php echo $row['id_pesanan']; ?>">Cek pembayaran</a> </td>
            <?php
        }else if ($row['status_pembayaran']=='Sudah'){
            ?>
            <td> <a href="kirim_gambar.php?id=<?php echo $row['username']; ?>" style='background-color: #e6f2ff;'>Kirim Gambar</a></td><?php
        }else if ($row['status_pembayaran']=='SELESAI'){
            ?>
            <td> <p>SELESAI</p></td>
            <p>SELESAI</p>
            <?php
        }
        }
    
    ?>

    </tbody>

    <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

</table>
</html>