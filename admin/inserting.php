<?php
 
include 'koneksi.php';
 
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);
$role = $_POST['role'];
$checkName = "SELECT * FROM user WHERE username = '$username'";
$run = mysqli_query($conn, $checkName);
$data = mysqli_fetch_array($run);
 
$sql = "INSERT INTO user (id, username, email,password,role,hash) VALUES (NULL,'$username', '$email', '$password','$role','')";
if ($data[0] > 0) {
	?>
<script>alert('Name already registered. Input a different name')
window.location = "lecturer.php";
</script>   
   <?php
   exit();
} else {
$tun = mysqli_query($conn, $sql);
header("location:lecturer.php");
}
?>
