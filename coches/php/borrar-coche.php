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
$sql = "SELECT * FROM coches";
$consulta = mysqli_query ($conn,$sql);
$nfilas = mysqli_num_rows ($consulta);
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Coches - Añadir</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(../../img/otrofondo.jpg);
        }

        #header {
            display: flex;
            background-color: red;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 80px;
            align-items: center;
            justify-content: space-between;
        }

        #span {
            color: white;
            padding-left: 20px;
            font-size: 30px;
            font-weight: bolder;
            font-variant: small-caps;
        }

        .menu {
            position: relative;
        }

        .menu > .boton {
            color: white;
            font-size: 20px;
            font-weight: bold;
            background-color: red;
            border: none;
            padding: 20px;
            cursor: pointer;
            margin-right: 200px;
        }

        .boton-opciones {
            display: none;
            position: absolute;
            top: 80px; 
            background-color: white;
            list-style: none;
            margin: 0;
            padding: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            width: 150px;
        }

        .boton-opciones li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .boton-opciones li:hover {
            background-color: #f2f2f2;
        }

        .menu:hover .boton-opciones {
            display: block;
        }
        .table-th {
            background-color: red;
            text-align: center;
            font-weight: bolder;
            font-variant: small-caps;
            color: white;
            border: 3px black solid;
        }
        .tabla {
            border: 3px black solid;
            font-weight: bolder;
            font-variant: small-caps;
            color: black;
            width: 90%;
            border-collapse: collapse;
            margin-top: 50px;
            margin-left: 100px;

        }
        .td {
            border: 3px black solid;
            background-color: white;
            text-align: center;

        }
        #sigma {
            width: 100%;
            text-align: center;
        }
        #botones {
            padding-left: 20px;
            padding-right: 20px;
            padding: 10px;
            background-color: red;
            color: white;
            font-variant: small-caps;
            font-weight: bolder;
            border-radius: 10px;
        }
        </style>
        </head>
<body>

<div id='header'>
    <span id='span'>Concesionario Jareño</span>
    <div class='menu'>
        <button class='boton'>COCHES</button>
        <ul class='boton-opciones'>
            <a href='../../index.html'><li>Inicio</li></a>
            <a href='../coches-index.html'><li>Añadir</li></a>
            <a href='listar-coche.php'><li>Listar</li></a>
            <a href='../buscar.html'><li>Buscar</li></a>
            <a href=''><li>Modificar</li></a>
            <a href='borrar-coche.php'><li>Borrar</li></a>
        </ul>
    </div>
    <div class='menu'>
        <button class='boton'>USUARIOS</button>
        <ul class='boton-opciones'>
            <a href='../../index.html'><li>Inicio</li></a>
            <a href='../../usuarios/usuarios.añadir.html'><li>Añadir</li></a>
            <a href='../../usuarios/php/listar-usuario.php'><li>Listar</li></a>
            <a href=''><li>Buscar</li></a>
            <a href=''><li>Modificar</li></a>
            <a href='../../usuarios/php/borrar-usuario.php'><li>Borrar</li></a>
        </ul>
    </div>
    <div class='menu'>
        <button class='boton'>ALQUILERES</button>
        <ul class='boton-opciones'>
            <a href='../../index.html'><li>Inicio</li></a>
            <a href='../../alquileres/php/listar-alquiler.php'><li>Listar</li></a>
            <a href='../../alquileres/php/borrar-alquiler.php'><li>Borrar</li></a>
        </ul>
    </div>
</div>
<div id='elform'>";
echo "<form action='eliminar.php' method='POST'>";
    print ("<table class='tabla'>\n");
    print ("<tr>\n");
    print ("<th class='table-th'>Borrar</th>\n");
    print ("<th class='table-th'>Modelo</th>\n");
    print ("<th class='table-th'>Marca</th>\n");
    print ("<th class='table-th'>Color</th>\n");
    print ("<th class='table-th'>Precio</th>\n");
    print ("<th class='table-th'>Alquilado</th>\n");
    print ("<th class='table-th'>Foto</th>\n");
    print ("</tr>\n");
    while ($row = mysqli_fetch_assoc($consulta))
    {
    print ("<tr>\n");
    print ("<td class='td'><input type='checkbox' name='delete_ids[]' value='" . $row['id_coche'] . "'></td>");
    print ("<td class='td'>" . htmlspecialchars($row['modelo']) . "</td>\n");
    print ("<td class='td'>" . htmlspecialchars($row['marca']) . "</td>\n");
    print ("<td class='td'>" . htmlspecialchars($row['color']) . "</td>\n");
    print ("<td class='td'>" . htmlspecialchars($row['precio']) . "</td>\n");
    print ("<td class='td'>" . htmlspecialchars($row['alquilado']) . "</td>\n");
    print ("<td class='td'>" . htmlspecialchars($row['foto']) . "</td>\n");
    print ("</tr>\n");
    }
    print ("</table><br>\n");
    echo "<div id='sigma'>";
    echo "<input type='submit' value='Eliminar' id='botones'>";
    echo "</div>";
echo "</form>";
echo "</div>
</html>";
mysqli_close($conn); 
?>