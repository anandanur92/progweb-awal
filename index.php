<?php
if(isset($_GET["pesan"])){
    $pesan= $_GET["pesan"];
}
if(isset($_POST["submit"])){
    $username= htmlentities(strip_tags(trim($_POST["username"])));
    $password= htmlentities(strip_tags(trim($_POST["password"])));
    $pesan_error="";
    if(empty($username)){
        $pesan_error .="Username belum terisi <br>";
    }
    if(empty($password)){
        $pesan_error .="Password belum terisi <br>";
    }

    include("connection.php");
    $username= mysqli_real_escape_string($mysqli, $username);
    $password= mysqli_real_escape_string($mysqli, $password);
    $password_sha1= sha1($password);

    $query= "SELECT*FROM user_admin WHERE username= '$username' AND password= '$password_sha1'";
    $hasil= mysqli_query($mysqli, $query);

    if(mysqli_num_rows($hasil)==0){
        $pesan_error .= "Coba Lagi";
    }
    mysqli_free_result($hasil);
    mysqli_close($mysqli);
    if($pesan_error===""){
        session_start();
        $_SESSION["nama"]= $username;
        header("Location: tampil.php");
    }
}
else{
    $pesan_error="";
    $username="";
    $password= "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="login">
<h1>ADMIN PANEL TOKO BAJU</h1>
<?php
if(isset($pesan)){
    echo "<div class=\"pesan\">$pesan</div>";
}
if($pesan_error !== ""){
    echo "<div class=\"error\">$pesan_error</div>";
}
?>
<form action= "index.php" method="post">
<fieldset>
<legend>Login Admin</legend>
    <p>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username"
        value="<?php echo $username ?>">
    </p>
    <p>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password"
    value="<?php echo $username ?>">
    </p>

    <p>
    <input type="submit" name="submit" value="Log In">
    </p>
</fieldset>
</form>
</div>
</body>
</html>
