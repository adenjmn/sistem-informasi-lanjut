<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style-admin.css">
	<link rel="stylesheet" href="css/style-kirim.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>KIRIM DESAIN - ADMIN - JAZA DESIGN</title>
</head>
<header>
    <div class="container">
      <h1 class="logo"></h1>

      <nav>
        <ul>
          <li><a href="kirim_design.php">Kirim Desain</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<h1>Halaman Admin</h1>

</body>
<div class="container"></div>
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
    <tbody>
    <?php    
        include 'koneksi.php';
        $query = "SELECT * FROM pesanan";
        $pesanan = mysqli_query($koneksi,$query);

        // $pesanan = mysqli_query($koneksi,$sql);
        while($row = mysqli_fetch_array($pesanan))
        {
            echo "<tr>
            <td><img src='gambar/".$row['gambar1']."'></td>
            <td>".$row['id_pesanan']."</td>
            <td>".$row['jenis']."</td>
            <td>".$row['tujuan']."</td>
            <td>".$row['warna']."</td>
            <td>".$row['waktu']."</td>
            <td>".$row['status_pembayaran']."</td>
            <td> <button class='btn btn-primary'>konfirmasi</button> </td>
            <td> <button class='btn btn-primary'>Kirim Gambar</button> </td>

        </tr>";
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