<?php
	session_start();
	if (!isset($_SESSION["nama"])){
		header("Location: login.php");
	}
	include "connection.php"; //memanggil file koneksi.php untuk menghubungkan ke database
	
	if(isset($_POST['update'])){
		$id 	= $_POST['id'];
		$nama_baju 	= $_POST['baju'];

		$data = mysqli_query($mysqli, "UPDATE stok SET id='$id', baju='$nama_baju' WHERE id='$id'") or die ("data salah : ".mysqli_error($mysqli));

		if($data){
			echo "Berhasil Update Data <br>";
			echo "<a href='tampil.php'>Kembali</a>";
		}else{
			echo "Gagal Input Data !!!<br>";
			echo "<a href='tampil.php'>Kembali</a>";
		}
	}
?>