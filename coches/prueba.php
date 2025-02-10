<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Conexión fallida: " . mysqli_connect_error());
}
$modelo = mysqli_real_escape_string($conn,$_REQUEST["modelo"]);
$marca = mysqli_real_escape_string($conn,$_REQUEST["marca"]);
$color = mysqli_real_escape_string($conn,$_REQUEST["color"]);
$precio = mysqli_real_escape_string($conn,$_REQUEST["precio"]);
$sql = "SELECT * FROM coches WHERE modelo LIKE '%$modelo%' AND marca LIKE '%$marca%' AND color LIKE '%$color%' AND precio BETWEEN '$precio' AND '$precio+1000'";
if (mysqli_query ($conn,$sql))
{
    $nfilas = mysqli_num_rows (mysqli_query ($conn,$sql));
    echo "se ha hecho";
    echo $nfilas;
}
else
{
    echo "no se ha hecho";
}
?>