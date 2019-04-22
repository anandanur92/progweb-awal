<?php
//untuk koneksi
    $databasehost = "localhost";
    $databaseuser = "root";
    $databasepass = "";
    $check = mysqli_connect($databasehost,$databaseuser,$databasepass);

    //pengecekan koneksi antara php dan mysql
    if(!$check){
        die ("Koneksi gagal, ada masalah pada: ".mysqli_connect_errno().
            " - ".mysqli_connect_error());
    }

    //create database baru
    $mysqlquery = "CREATE DATABASE IF NOT EXISTS toko_baju";
    $hasilquery = mysqli_query($check, $mysqlquery);

    if(!$hasilquery){
        die ("mysqlquery Error: ".mysqli_errno($check).
            " - ".mysqli_error($check));
    }else{
        echo "Database <b>'toko_baju'</b> berhasil dibuat, silahkan cek pada phpmyadmin... <br>"; 
    }

    //select database toko_baju untuk ddl
    $hasilquery = mysqli_select_db($check, "toko_baju");

    if(!$hasilquery){
        die ("mysqlquery Error: ".mysqli_errno($check).
            " - ".mysqli_error($check));
    }else{
        echo "Database <b>'toko_baju'</b> berhasil dipilih... <br>";
    }

    //cek data jika ada dihapus
    $mysqlquery ="DROP TABLE IF EXISTS stok";
    $hasil_mysqlquery = mysqli_query($check, $mysqlquery);

    if(!$hasil_mysqlquery){
        die ("mysqlquery Error: ".mysqli_errno($check).
            " - ".mysqli_error($check));
    }else{
        echo "Tabel <b>'stok'</b> berhasil dihapus, silahkan cek pada phpmyadmin... <br>";
    } 

    //create table stock
    $mysqlquery = "CREATE TABLE stok (id CHAR(9), baju VARCHAR(50))";

    $hasil_mysqlquery = mysqli_query($check, $mysqlquery);

    if(!$hasil_mysqlquery){
        die ("mysqlquery Error: ".mysqli_errno($check).
            " - ".mysqli_error($check));
    }else{
        echo "Tabel <b>'stock'</b> berhasil dibuat, silahkan cek pada phpmyadmin... <br>";
    }

    //insert data ke table stok
    $mysqlquery = "INSERT INTO stok VALUES ";
    $mysqlquery .= "(1, 'kemeja batik'),";
    $mysqlquery .= "(2, 'kaos vneck')";

    $hasil_mysqlquery = mysqli_query($check, $mysqlquery);

    if(!$hasil_mysqlquery){
        die ("mysqlquery Error: ".mysqli_errno($check).
            " - ".mysqli_error($check));
    }else{
        echo "Tabel <b>'stock'</b> berhasil diisi, silahkan cek pada phpmyadmin... <br>";
    } 

    //buat tabel user_Admin sebagai user
    $mysqlquery ="DROP TABLE IF EXISTS user_admin";
    $hasil_mysqlquery = mysqli_query($check, $mysqlquery);

    if(!$hasil_mysqlquery){
        die ("mysqlquery Error: ".mysqli_errno($check).
            " - ".mysqli_error($check));
    }else{
        echo "Tabel <b>'user_admin'</b> berhasil dihapus, silahkan cek pada phpmyadmin... <br>";
    } 

    //create table user_admin
    $mysqlquery = "CREATE TABLE user_admin (username VARCHAR(50), password CHAR(40))";
    $hasil_mysqlquery = mysqli_query($check, $mysqlquery);

    if(!$hasil_mysqlquery){
        die ("mysqlquery Error: ".mysqli_errno($check).
            " - ".mysqli_error($check));
    }else{
        echo "Tabel <b>'user_admin'</b> berhasil dibuat, silahkan cek pada phpmyadmin... <br>";
    }

    //inisiasi username dan password untuk user admin
    $usernames = "adminToko";
    $pass = sha1("akuadmin");

    //INSERT data ke tabel user_admin
    $mysqlquery = "INSERT INTO user_admin VALUES ('$usernames','$pass')";

    $hasil_mysqlquery = mysqli_query($check, $mysqlquery);

    if(!$hasil_mysqlquery){
        die ("mysqlquery Error: ".mysqli_errno($check).
            " - ".mysqli_error($check));
    }else{
        echo "Tabel <b>'user_admin'</b> berhasil diisi, silahkan cek pada phpmyadmin... <br>";
    }

    //tutup koneksi ke mysql
    mysqli_close($check);
?>