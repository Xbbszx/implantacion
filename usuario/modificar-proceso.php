<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
$nombre = mysqli_real_escape_string($conn,$_REQUEST["nombre"]);
$apellidos = mysqli_real_escape_string($conn,$_REQUEST["apellidos"]);
$dni = mysqli_real_escape_string($conn,$_REQUEST["dni"]);
$saldo = mysqli_real_escape_string($conn,$_REQUEST["saldo"]);
$id = $_SESSION['iduser'];
$sql = "UPDATE usuarios SET nombre='$nombre' WHERE id_usuario=$id";
$sql2 = "UPDATE usuarios SET apellidos='$apellidos' WHERE id_usuario=$id";
$sql3 = "UPDATE usuarios SET dni='$dni' WHERE id_usuario=$id";
$sql4 = "UPDATE usuarios SET saldo=$saldo WHERE id_usuario=$id";
if ($nombre != '')
{
    mysqli_query ($conn,$sql);
}
if ($apellidos != '')
{
    mysqli_query ($conn,$sql2);
}
if ($dni != '')
{
    mysqli_query ($conn,$sql3);
}
if ($saldo != '')
{
    mysqli_query ($conn,$sql4);
}
else
{
    $_SESSION['error'] = "Error al modificar";
    header('Location: ./modificar2.php');
}
header('Location: ./listar.php');
?>