<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM lemari WHERE id=$id");
header("Location:lemari.php");
?>