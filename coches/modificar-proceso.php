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
$modelo = mysqli_real_escape_string($conn,$_REQUEST["modelo"]);
$marca = mysqli_real_escape_string($conn,$_REQUEST["marca"]);
$color = mysqli_real_escape_string($conn,$_REQUEST["color"]);
$precio = mysqli_real_escape_string($conn,$_REQUEST["precio"]);
$id = $_SESSION['idcarro'];
$sql = "UPDATE coches SET modelo='$modelo' WHERE id_coche=$id";
$sql2 = "UPDATE coches SET marca='$marca' WHERE id_coche=$id";
$sql3 = "UPDATE coches SET color='$color' WHERE id_coche=$id";
$sql4 = "UPDATE coches SET precio=$precio WHERE id_coche=$id";
if (mysqli_query ($conn,$sql))
{
    mysqli_query ($conn,$sql);
    mysqli_query ($conn,$sql2);
    mysqli_query ($conn,$sql3);
    mysqli_query ($conn,$sql4);
    header('Location: ./listar.php');
}
else
{
    $_SESSION['error'] = "Error al modificar";
    header('Location: ./modificar2.php');
}
?>