<!DOCTYPE html>
<html>
<head>
	<title>Login JAZA</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 

<img class="wave" src="img/wap.png">
	<div class="container">
		<div class="img">
			
		</div>

		<div class="login-content">
			<form action="cek_login.php" method="post">
				<img src="img/logo.png">
				<h2 class="title">Selamat Datang</h2>
        <?php 
          if(isset($_GET['pesan'])){
            if($_GET['pesan']=="gagal"){
              echo "<div class='alert' style='color:red;'>Username atau Password salah!</div>";
            }
            if ($_GET['pesan']=="access"){
              echo "<div class='alert' style='color:orange;'>Akses ditolak!</div>";
            }
          }
        ?>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<a href="registrasi.php">Registrasi baru?</a>
            	<input type="submit" class="btn" value="LOGIN">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>