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
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$password = $_REQUEST["password"];
$dni = $_REQUEST["dni"];
$saldo= intval($_REQUEST["saldo"]);
$sql = "INSERT INTO usuarios (password, nombre, apellidos, dni, saldo) VALUES ('$password', '$nombre', '$apellido', '$dni', '$saldo')";
if (mysqli_query($conn, $sql))
{
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
            background-image: url(../../img/fondo.jpg);
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
        #elform {
            padding-top: 50px;
            background-color: white;
            width: 30%;
            height: 470px;
            align-items: center;
            text-align: center;
            margin-top: 6%;
            margin-left: 33%;
            border-radius: 13px;
            box-shadow: 5px 5px 5px black;
        }
        .letras {
            font-variant: small-caps;
            font-weight: bold;
        }
        #botones {
            padding: 30px;
            background-color: red;
            color: white;
            font-variant: small-caps;
            font-weight: bolder;
            border-radius: 10px;
        }
        #bien {
            color: greenyellow;
        }
        #mal {
            color: red;
        }
    </style>
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
            <a href='../usuarios.añadir.html'><li>Añadir</li></a>
            <a href='listar-usuario.php'><li>Listar</li></a>
            <a href=''><li>Buscar</li></a>
            <a href=''><li>Modificar</li></a>
            <a href=''><li>Borrar</li></a>
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
<div id='elform'>
    <form action='añadir-usuario.php' method='post'>
        <b id='bien'>USUARIO INSERTADO CORRECTAMENTE</b><br>
        <label for='modelo' class='letras'>Nombre:</label><br><input type='text' name='nombre' required><br><br>
        <label for='marca' class='letras'>Apellido:</label> <br><input type='text' name='apellido' required><br><br>
        <label for='color' class='letras'>Contraseña:</label> <br><input type='password' name='password' required><br><br>
        <label for='precio' class='letras'>DNI:</label> <br><input type='text' name='dni'required><br><br>
        <label for='alquilado' class='letras'>Saldo:</label> <br><input type='number' name='saldo'><br><br>
        <input type='submit' value='Añadir Usuario' id='botones'>
    </form>
</div>
</html>";
}
else 
{
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
                background-image: url(../../img/fondo.jpg);
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
            #elform {
                padding-top: 50px;
                background-color: white;
                width: 30%;
                height: 470px;
                align-items: center;
                text-align: center;
                margin-top: 6%;
                margin-left: 33%;
                border-radius: 13px;
                box-shadow: 5px 5px 5px black;
            }
            .letras {
                font-variant: small-caps;
                font-weight: bold;
            }
            #botones {
                padding: 30px;
                background-color: red;
                color: white;
                font-variant: small-caps;
                font-weight: bolder;
                border-radius: 10px;
            }
            #bien {
                color: greenyellow;
            }
            #mal {
                color: red;
            }
        </style>
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
                <a href='../usuarios.añadir.html'><li>Añadir</li></a>
                <a href='listar-usuario.php'><li>Listar</li></a>
                <a href=''><li>Buscar</li></a>
                <a href=''><li>Modificar</li></a>
                <a href='borrar-usuario.php'><li>Borrar</li></a>
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
    <div id='elform'>
        <form action='añadir-usuario.php' method='post'>
            <b id='mal'>NO SE HA INSERTADO EL USUARIO</b><br>
            <label for='modelo' class='letras'>Nombre:</label><br><input type='text' name='nombre' required><br><br>
            <label for='marca' class='letras'>Apellido:</label> <br><input type='text' name='apellido' required><br><br>
            <label for='color' class='letras'>Contraseña:</label> <br><input type='password' name='password' required><br><br>
            <label for='precio' class='letras'>DNI:</label> <br><input type='text' name='dni'required><br><br>
            <label for='alquilado' class='letras'>Saldo:</label> <br><input type='number' name='saldo'><br><br>
            <input type='submit' value='Añadir Usuario' id='botones'>
        </form>
    </div>
    </html>";
}
?>