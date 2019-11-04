<?php
include 'koneksi.php';
$id_produk = $_POST ['nama_barang'];
$id_user = $_POST ['nama_peminjam'];
$tgl_pinjam = $_POST ['tgl_pinjam'];
        $query = "INSERT INTO peminjaman( id_produk, id_user, tgl_pinjam) values ('$id_produk', '$id_user','$tgl_pinjam')";
        if (mysqli_query($conn,$query)) {
    header("location:peminjaman.php");
    //    	echo "Sukses";
} else {
    echo "gagal menambah data";
  }

?>
