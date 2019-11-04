<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM user WHERE id=$id");
$result2 = mysqli_query($conn, "DELETE FROM student WHERE id=$id");
header("Location:student.php");
?>