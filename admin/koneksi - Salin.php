<?php
$servername = "localhost";
$username = "root";
$password = "hahaha111";
$dbname = "barang";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Koneksi gagal");
}
else {
	echo "";
}
?>
