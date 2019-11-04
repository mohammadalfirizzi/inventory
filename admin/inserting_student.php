<?php
 
include 'koneksi.php';
 
$nama = $_POST['username'];
$email = $_POST['email'];
$checkName = "SELECT * FROM student WHERE username = '$username'";
$run = mysqli_query($conn, $checkName);
$data = mysqli_fetch_array($run);
 
//$sql = "INSERT INTO student (id, nama, email) VALUES (NULL,'$nama', '$email')";
$sql2 = "INSERT INTO user (id, username, email,role,password,hash) VALUES (NULL,'$nama', '$email','student',NULL,'')";
if ($data[0] > 0) {
	?>
<script>alert('Name already registered. Input a different name')
window.location = "student.php";
</script>   
   <?php
   exit();
} else {
//$tun = mysqli_query($conn, $sql);
$tun2 = mysqli_query($conn, $sql2);
header("location:student.php");
}
?>
