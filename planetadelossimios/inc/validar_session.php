<?php 
include_once('class.MySQL.php');
session_start();

$user = $_POST['usuario'];
$pass = md5($_POST['pass']);


$_SESSION['usuario'] = $user;

$db = new MySQL();
$query = "SELECT * FROM usuarios where usuario ='$user' and password= '$pass'";


if($db -> ExecuteSQL($query) == false){    
    ?>   
    <?php 
    session_destroy();   
    echo '<script herf="../ingreso.html" language="javascript">alert("Usuario y/o contraseña incorrectos");window.location.href="../ingreso.html"</script>';
    ?>
    <?php
}else{
    header('location:../index.php');    
}
$db -> CloseConnection();
