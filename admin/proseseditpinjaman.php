<?php
include 'koneksi.php';
$id_peminjam = $_POST['id_peminjam'];
$id_produk = $_POST['id_produk'];
$id_user = $_POST['id_user'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$status = $_POST['status'];


$ganti = "UPDATE peminjaman set id_produk='$id_produk', id_user='$id_user', tgl_pinjam='$tgl_pinjam', status='$status' where id_peminjam='$id_peminjam'";

if ($status == 1) {
	$tgl_kembali = date('Y-m-d');
	$insert = "INSERT INTO pengembalian(id_produk, id_peminjaman, id_user, tgl_kembali) values('$id_produk', '$id_peminjam', '$id_user', '$tgl_kembali')";
	$conn->query($insert) or die('gagal menambah data pengembalian');
}

$update = $conn->query($ganti);

if($update) {
	header("location:peminjaman.php");
	//echo "Berhasil";
}else{
	echo $ganti;
	echo "gagal mengubah data";
}
?>