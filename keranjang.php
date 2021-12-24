<!DOCTYPE html>
<html>
<head>
    <title>Keranjang -Jaza Design</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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

<div class="klas_tab">
<table id="tabel-data" class="table">
    <thead>
        <tr>
            <th>ID Pemesanan</th>
            <th>Jenis</th>
            <th>Tujuan</th>
            <th>Warna</th>
            <th>Waktu</th>
            <th>Status Pembayaran</th>
            <th>Konfirmasi</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
    <?php
    	session_start();
        include 'koneksi.php';
        
        if($_SESSION['level']!="user"){
            header("location:index.php?pesan=gagal");
        }

        $key = $_SESSION['username'];
        $query = "SELECT * FROM pesanan WHERE username LIKE '%".$key."%'";
        $pesanan = mysqli_query($koneksi,$query);

    
        while($row = mysqli_fetch_array($pesanan))
        {
            echo "<tr>
            <td>".$row['id_pesanan']."</td>
            <td>".$row['jenis']."</td>
            <td>".$row['tujuan']."</td>
            <td>".$row['warna']."</td>
            <td>".$row['waktu']."</td>
            <td>".$row['status_pembayaran']."</td>";
         if ($row['status_pembayaran']=='Belum bayar') {
            ?>
            <td> <a href="konfirmasi_bayar_bukti.php?id=<?php echo $row['id_pesanan']; ?>">Konfirmasi</a> </td>
            <?php
        }else if ($row['status_pembayaran']=='Sudah'){
            ?>
            <td><p>Sudah bayar</p></td><?php
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
</div>
</body>
</html>