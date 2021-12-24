<?php

require_once("koneksi.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $level = "user";
    // menyiapkan query
    
    // menginput data ke database
    mysqli_query($koneksi,"insert into user values('','$nama', '$username', '$email', '$password','$level')");

    // maka alihkan ke halaman login
    header("Location: index.php");
}

?>


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

<img class="wave" src="img/vct.png">
    <div class="container">
        <div class="img">
        </div>
        <div class="login-content">
            <form action="" method="post">
                <img src="img/logo.png">
                <h2 class="title">Registrasi</h2>
                <a href="index.php" style="text-align: center;">Login kembali</a>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Nama Lengkap</h5>
                        <input type="text" class="input" name="nama">
                   </div>
                </div>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="username">
                   </div>
                </div>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-envelope"></i>
                   </div>
                   <div class="div">
                        <h5>Email</h5>
                        <input type="text" class="input" name="email">
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
                <input type="submit" class="btn" name="register" value="Daftar" />
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>