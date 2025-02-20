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
$coche = $_SESSION['alqui'];
$dni = $_SESSION['dni'];
$sql = "SELECT * FROM coches WHERE id_coche = $coche";
$consulta = mysqli_query ($conn,$sql);
$nfilas = mysqli_num_rows ($consulta);
$row = mysqli_fetch_assoc($consulta);
if($row['precio'] <= $_SESSION['saldo'])
{
    $saldo = ($_SESSION['saldo'] - $row['precio']);
    $sql1="UPDATE usuarios SET saldo = $saldo WHERE dni = $dni";
    if (mysqli_query ($conn,$sql1))
    {
        $sql2="INSERT INTO alquileres (id_usuario, id_coche, prestado, devuelto) VALUES ($_SESSION[id], $coche, now(), NULL)";
        if (mysqli_query ($conn,$sql2))
        {
            $sql3="UPDATE coches SET alquilado = 1 WHERE id_coche = $coche";
            if (mysqli_query ($conn,$sql3))
            {
                header('Location: ../index.php');
            }
        }
    }
}
else
{
    $_SESSION['error'] = "No hay saldo suficiente";
    header('Location: ./alquilar-proceso.php');
}
?>