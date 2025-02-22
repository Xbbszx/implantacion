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
$nombre = mysqli_real_escape_string($conn,$_REQUEST["nombre"]);
$apellido = mysqli_real_escape_string($conn,$_REQUEST["apellido"]);
$passw = mysqli_real_escape_string($conn,$_REQUEST["password"]);
$passw_hash = password_hash($passw, PASSWORD_DEFAULT);
$dni = mysqli_real_escape_string($conn,$_REQUEST["dni"]);
$tipo = mysqli_real_escape_string($conn,$_REQUEST["tipo"]);
$sqldni = "SELECT dni FROM usuarios WHERE dni='$dni'";
$sql = "INSERT INTO usuarios (nombre, apellidos, password, dni, admin, saldo) VALUES ('$nombre','$apellido','$passw_hash','$dni', '$tipo', 0)";
$consulta2 = mysqli_query($conn, $sqldni);
$nfilas2 = mysqli_num_rows ($consulta2);
if ($nfilas2 > 0)
{
    $_SESSION['error'] = "Este DNI ya esta en uso";
    header('Location: ./registro.php');
}
else
{
    mysqli_query($conn, $sql);
    header('Location: ../index.php');
    exit;
}
?>