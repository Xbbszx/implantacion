<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Conexión fallida: " . mysqli_connect_error());
}
$dni = mysqli_real_escape_string($conn,$_REQUEST["dni"]);
$passw = mysqli_real_escape_string($conn,$_REQUEST["password"]);
$sql = "SELECT * FROM usuarios WHERE dni='$dni'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
?>