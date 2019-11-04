<?php
 
include 'koneksi.php';
 
$username = $_POST['username'];
$email = $_POST['email'];
$checkName = "SELECT * FROM user WHERE username = '$username'";
$run = mysqli_query($conn, $checkName);
$data = mysqli_fetch_array($run);
 
$sql = "INSERT INTO user (id, username, email,role) VALUES (NULL,'$username', '$email', 'student')";
 
if ($data[0] > 0) {
	?>
<script>alert('Name already registered. Input a different name')
window.location = "register.php";
</script>   
   <?php
   exit();
} else {
mysqli_query($conn, $sql);
header("location:index.php");
}
?>
