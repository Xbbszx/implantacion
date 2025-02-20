<?php
session_start();
$_SESSION['error'] = "";
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
if (strcasecmp($dni, $row['dni']) === 0 && password_verify($passw,$row['password']))
{
    header('Location: ../index.php');
    $_SESSION['id'] = $row['id_usuario']
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apellido'] = $row['apellidos'];
    $_SESSION['tipo'] = $row['admin'];
    $_SESSION['saldo'] = $row['saldo'];
    $_SESSION['dni'] = $row['dni'];
}
else
{
    $_SESSION['error'] = "DNI o contraseña incorrecto";
    header('Location: ./login.php');
}
?>