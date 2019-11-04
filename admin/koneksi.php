<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barang";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Koneksi gagal");
}
else {
	echo "";
}
?>
