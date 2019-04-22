<?php
    session_start();
    if(!isset($_SESSION["nama"])){
        header("Location: login.php");
    }
    include "connection.php";//memanggil file koneksi.php untuk menghubungkan ke database
?>
<html>
    <head>
        <title>Tampil</title>
    </head>
    <body>
        <p>DAFTAR STOK BAJU</P>
        <a href="add.php">
            <button> tambah stok baju</button>
        </a><br><br>
        <table width="370" border="1" cellpadding="10">
            <thead>
                <tr>
                    <td width="50">ID baju</td>
                    <td width="133">ID nama</td>
                    <td width="85" colspan="2">aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stok = mysqli_query($mysqli, "SELECT * FROM stok");//memberikan perintah query sql untuk menampilkan semua stok
                    //perintah untuk menampilkan semua stok yang ada di tabel jual menggunkan prulangan
                    while($show = mysqli_fetch_array($stok)){
                ?>
                <tr>
                <td><?php echo $show['id'];?></td>
                    <td><?php echo $show['baju'];?></td>
                    <td><a href="update.php?id=<?php echo $show['id'];?>"><button>edit</button></a>
                    <a href="deletesql.php?id=<?php echo $show['id'];?>"><button>delete</button></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <br>
    <a href="print.php">
        <button>Print Stok</button>
    </a>
    <br>
    <br>
    <a href="logout.php">
        <button>Log Out</button>
    </a>
    </body>
</html>