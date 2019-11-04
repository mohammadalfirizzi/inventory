<?php
include 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM media WHERE id='$id'";
$result = $conn->query($sql);
$data = mysqli_fetch_array($result);
$foto = $data["file_name"];
$result = mysqli_query($conn, "DELETE FROM media WHERE id=$id");
unlink("file/".$foto);
header("Location:media.php");
?>