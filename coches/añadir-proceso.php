<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";
$target_dir = "../imgs/";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Conexión fallida: " . mysqli_connect_error());
}
$modelo = mysqli_real_escape_string($conn,$_REQUEST["modelo"]);
$marca = mysqli_real_escape_string($conn,$_REQUEST["marca"]);
$color = mysqli_real_escape_string($conn,$_REQUEST["color"]);
$precio = mysqli_real_escape_string($conn,$_REQUEST["precio"]);
$foto = '';
if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) 
{
    $file = $_FILES['foto'];
    $target_file = $target_dir . basename($file["name"]);
    $check = getimagesize($file["tmp_name"]);
        if ($check === false) 
        {
            die("El archivo seleccionado no es una imagen.");
        }
        if (file_exists($target_file)) 
        {
            die("El archivo ya existe en el servidor.");
        }
        if (move_uploaded_file($file["tmp_name"], $target_file)) 
        {
            $foto = $target_file;
            echo "La foto " . htmlspecialchars(basename($file["name"])) . " se ha subido correctamente.";
        } 
        else 
        {
            echo "Hubo un error al subir la foto.";
        }
}
$sql = "INSERT INTO coches (modelo, marca, color, precio,foto) VALUES ('$modelo', '$marca', '$color', '$precio', '$foto')";
if (mysqli_query($conn, $sql))
{
    header('Location: ./listar.php');
}
else
{
    $_SESSION['error'] = 'Error al insertar el coche';
}
mysqli_close($conn);
?>