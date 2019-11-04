<?php 
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);


$login = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
$data = mysqli_fetch_assoc($login);
$row = mysqli_fetch_array($login);

if($cek==1){
	header("location:panel.php");
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	//echo "berhasil";
}
else{
	header("location:index.php");
	echo "Gagal";	
}

?>