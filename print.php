<?php
    session_start();
    if(!isset($_SESSION["nama"])){
        header("Location: login.php");
    }
    include "connection.php";
?>
<html>
    <head>
        <title>Print Document</title>
    </head>
    <body>
        <table border="1" width="90%" style="border-collapse:collapse;" align="center">
            <tr class="tableheader">
                <th rowspan="1">id barang</th>
                <th>baju</th>
            </tr>
            <?php
                $stok = mysqli_query($mysqli,"SELECT * FROM stok");
                while ($show = mysqli_fetch_array($stok)){
            ?>
            <tr>
                <td width="10%" align="center"><?php echo $show['id'];?></td>
                <td width="25%" id="column_padding"><?php echo $show['baju'];?></td>
            </tr>
            <?php } ?>
        <table>
        <a href="tampil.php">
            <button>Kembali</button>
        </a>
        <script>
            window.load = print_d();
            function print_d(){
                window.print();
            }
        </script>
    </body>
</html>