<?php
include 'koneksi.php';
$id_pengembalian = $_GET['id_pengembalian'];
$sql = "SELECT * FROM pengembalian WHERE id_pengembalian='$id_pengembalian'";
$result = $conn->query($sql);
$data = mysqli_fetch_array($result);
$result = mysqli_query($conn, "DELETE FROM pengembalian WHERE id_pengembalian=$id_pengembalian");
header("Location:pengembalian.php");
?>