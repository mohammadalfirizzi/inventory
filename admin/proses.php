<?php
session_start();
include_once "database.php";
include_once "status_depan.php";
include 'koneksi.php';
$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM member WHERE username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);

$count=mysqli_num_rows($result);
$hasil=mysqli_fetch_array($result);

if ($count==1) {
	header("location:panel.php");
	$_SESSION['id_member'] = $hasil['id_member'];
	//echo "Yaaa";
}
else{
	echo "Belum terdaftar";
}

?>