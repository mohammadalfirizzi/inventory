<?php
include 'koneksi.php';
$id_peminjam = $_GET['id_peminjam'];
$sql = "SELECT * FROM peminjaman WHERE id_peminjam='$id_peminjam'";
$result = $conn->query($sql);
$data = mysqli_fetch_array($result);
$result = mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjam=$id_peminjam");
$sql2 = "SELECT * FROM pengembalian WHERE id_peminjaman='$id_peminjam'";
$result2 = $conn->query($sql2);
$data2 = mysqli_fetch_array($result2);
$result2 = mysqli_query($conn, "DELETE FROM pengembalian WHERE id_peminjaman=$id_peminjam");
header("Location:peminjaman.php");
?>