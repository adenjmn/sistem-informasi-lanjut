<?php 
$koneksi = mysqli_connect("localhost","root","","jaza");
// $db_host = "localhost";
// $db_user = "root";
// $db_pass = "";
// $db_name = "jaza";
// $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>