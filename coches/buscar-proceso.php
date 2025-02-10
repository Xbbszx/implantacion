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
$sql = "SELECT * FROM coches WHERE modelo LIKE '%$modelo%' AND marca LIKE '%$marca%' AND color LIKE '%$color%' AND precio LIKE  '%$precio%'";
$consulta = mysqli_query ($conn,$sql);
$nfilas = mysqli_num_rows ($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coches - Buscar</title>
    <style>
         * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(../img/fondo.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        #header {
            display: flex;
            flex-wrap: wrap;
            background-color: red;
            width: 100%;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }
        #span {
            color: white;
            font-size: 24px;
            font-weight: bolder;
            font-variant: small-caps;
        }
        .menu-container {
            display: flex;
            gap: 20px;
        }
        .menu {
            position: relative;
        }
        .menu > .boton {
            color: white;
            font-size: 16px;
            font-weight: bold;
            background-color: red;
            border: none;
            padding: 12px 15px;
            cursor: pointer;
        }

        .boton-opciones {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            list-style: none;
            padding: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 160px;
            border-radius: 5px;
            overflow: hidden;
        }

        .boton-opciones a {
            text-decoration: none;
            color: black;
            display: block;
        }

        .boton-opciones li {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            transition: background 0.3s ease;
        }

        .boton-opciones li:hover {
            background-color: #f2f2f2;
        }
        .menu:hover .boton-opciones,
        .menu:focus-within .boton-opciones {
            display: block;
        }
        .auth-buttons {
            display: flex;
            gap: 10px;
        }

        .auth-buttons button {
            background-color: white;
            color: red;
            border: 2px solid white;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .auth-buttons button:hover {
            background-color: red;
            color: white;
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
    </style>
</head>
<body>
<div id="header">
    <span id="span">Concesionario Jareño</span>
    <div class="menu-container">
        <div class="menu">
            <button class="boton">COCHES</button>
            <ul class="boton-opciones">
                <a href="../index.php"><li>Inicio</li></a>
                <a href="./listar.php"><li>Listar</li></a>
                <a href="./buscar.php"><li>Buscar</li></a>
            </ul>
        </div>
        <div class="menu">
            <button class="boton">ALQUILERES</button>
            <ul class="boton-opciones">
                <a href="../index.php"><li>Inicio</li></a>
                <a href="../alquiler/listar.php"><li>Listar</li></a>
            </ul>
        </div>
        <div class="auth-buttons">
            <a class="login" href="../login/registro.php"><button>Registrar</button><a>
            <a class="login" href="../login/login.php"><button>Iniciar Sesión</button><a>
        </div>
    </div>
</div>
</div>
<div id='elform'>
<?php
    print ("<table class='tabla'>\n");
    print ("<tr>\n");
    print ("<th class='table-th'>Modelo</th>\n");
    print ("<th class='table-th'>Marca</th>\n");
    print ("<th class='table-th'>Color</th>\n");
    print ("<th class='table-th'>Precio</th>\n");
    print ("<th class='table-th'>Alquilado</th>\n");
    print ("<th class='table-th'>Foto</th>\n");
    print ("</tr>\n");
    for ($i=0; $i<$nfilas; $i++)
    {
    $resultado = mysqli_fetch_array ($consulta);
    echo $resultado["modelo"];
    print ("<tr>\n");
    print ("<td class='td'>" . $resultado['modelo'] . "</td>\n");
    print ("<td class='td'>" . $resultado['marca'] . "</td>\n");
    print ("<td class='td'>" . $resultado['color'] . "</td>\n");
    print ("<td class='td'>" . $resultado['precio'] . "</td>\n");
    print ("<td class='td'>" . $resultado['alquilado'] . "</td>\n");
    print ("<td class='td'><img src='" . $resultado['foto'] . "'></td>\n");
    print ("</tr>\n");
    }

    print ("</table>\n");
echo "</div>";
echo "</html>";
?>
</body>
</html>
<?php
mysqli_close($conn);
?>