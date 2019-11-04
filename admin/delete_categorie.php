<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM kategori WHERE id=$id");
header("Location:categorie.php");
?>