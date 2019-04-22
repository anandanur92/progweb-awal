<?php
session_start();
if(!isset($_SESSION["nama"])){
    header("location: login.php");
}
include "connection.php";//memanggil file koneksi.php untuk menghubungkan ke database

if(isset($_GET['simpan'])){
    $id = $_GET['id'];//memanggil nama variabel id untuk dibuat menjadi variabel baru $id
    $nama_baju = $_GET['baju'];

    //menambah query sql tambah data unuk memasukkan ke database
    $data = mysqli_query($mysqli, "INSERT INTO stok SET id='$id',baju='$nama_baju'") or die ("data salah: ".mysqli_error($mysqli));

    //untuk mengethui apakah data berhasil disimpan atau belum
    if($data){
        echo "berhasil input data";
        echo "<br><a href='tampil.php'>kembali</a>";//berfungsi untuk ngelink ke halaman tampil.php_ini_loaded_file
    }else{
        echo "gagal input data!!";
        echo "<br><a href='tampil.php'>kembali</a>";//berfungsi untuk neglink ke halaman tampil.php_ini_loaded_file

    }
}
?>

