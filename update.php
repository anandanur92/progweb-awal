<?php
	session_start();
	if (!isset($_SESSION["nama"])){
		header("Location: login.php");
	}
	include "connection.php"; //memanggil file koneksi.php untuk menghubungkan ke database

	//memberikan perintah query sql menampilkan data berdasarkan id yang dipilih
	$data = mysqli_query($mysqli, "SELECT * FROM stok WHERE id='$_GET[id]'");
	$datashow = mysqli_fetch_array($data); //menampilkan data yang sudah dipilih untuk diedit

?>

<html>
	<head>
		<title>Update</title>
	</head>
	<body>
		<form action ="updatesql.php" method="post">
			<p>UPDATE DATA BARANG<p>
			<p>
			<table>
			<tr><td>id baju </td><td><input type="text" name="id" value="<?php echo $_GET['id'];?>"></td></tr>
			<tr><td>nama baju </td><td><input type="text" name="baju" value="<?php echo $datashow['baju'];?>"></td></tr>
			<tr><td><input type="submit" name="update" value="EDIT"</td></tr>
			</table>
		</form>
	</body>
</html>