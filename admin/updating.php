<?php
 
include 'koneksi.php';
 
$nik = $_POST['nik'];
$plat = $_POST['plat'];
$pemilik = $_POST['pemilik'];
$merk = $_POST['merk'];
$alamat = $_POST['alamat'];
 
$sql = "UPDATE data_motor SET plat='$plat', pemilik='$pemilik', merk='$merk', alamat = '$alamat' WHERE nik='$nik'";
 
if(mysqli_query($conn, $sql)){
	//echo "berhasil";
    header("location:panel.php");
}else{
    echo "Update Gagal, Error : " . $conn->error;
}
 
mysqli_close($conn);
 
?>