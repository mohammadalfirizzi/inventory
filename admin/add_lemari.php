<?php
include 'koneksi.php';
if(isset($_POST['add_cat'])) {
        $nama = $_POST['nama'];
        $checkName = "SELECT * FROM lemari WHERE nama = '$nama'";
		$run = mysqli_query($conn, $checkName);
		$data = mysqli_fetch_array($run);
        $result = "INSERT INTO lemari(id,nama) VALUES(NULL,'$nama')";
        if ($data[0] > 0) {
				?>
			<script>alert('Name already added. Input a different name')
			window.location = "lemari.php";
			</script>   
			   <?php
			   exit();
			} else {
//			echo "gulo";
			$run1 = mysqli_query($conn,$result);
			header("location:lemari.php");
			}
		}
			?>
