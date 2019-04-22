<?php
	session_start();
	if(!isset($_SESSION['nama'])){
		header("Location: login.php");
	}
	include "connection.php"; //memanggil file koneksi.php untuk menghubungkan ke database

	if(isset($_GET['id'])){
		if(empty($_GET['id'])){
			echo "<b>Data yang dihapus tidak ada</b>";
		}
		else{
			$delete = mysqli_query($mysqli, "DELETE FROM stok WHERE id='$_GET[id]'") or die ("data salah: ".mysqli_error($mysqli));
				if($delete){
					echo "Berhasil hapus data <br>";
					echo "<a href='tampil.php'>Kembali</a>";
				}
		}
	}
?>