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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(img/lambo.jpg);
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
    </style>
</head>
<body>
<div id="header">
    <span id="span">Concesionario Jareño</span>
    <div class="menu-container">
        <?php
            if($_SESSION['tipo'] === 'com')
            {
                print '<div class="menu">';
                    print '<button class="boton">COCHES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="index.php"><li>Inicio</li></a>';
                        print '<a href="./coches/listar.php"><li>Listar</li></a>';
                        print '<a href="./coches/buscar.php"><li>Buscar</li></a>';
                    print '</ul>';
                print '</div>';
                print '<div class="menu">';
                    print '<button class="boton">ALQUILERES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="index.php"><li>Inicio</li></a>';
                        print '<a href="./alquiler/listar.php"><li>Listar</li></a>';
                        print '<a href="./alquiler/alquilar.php"><li>Alquilar</li></a>';
                   print '</ul>';
                print '</div>';
                        print '<div class="auth-buttons">';
                            print '<a class="login" href="./login/logout.php"><button>Cerrar Sesión</button></a>';
                        print '</div>';
            }
            elseif($_SESSION['tipo'] === 'usr')
            {
                print '<div class="menu">';
                    print '<button class="boton">COCHES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="index.php"><li>Inicio</li></a>';
                        print '<a href="./coches/añadir.php"><li>Añadir</li></a>';
                        print '<a href="./coches/listar.php"><li>Listar</li></a>';
                        print '<a href="./coches/buscar.php"><li>Buscar</li></a>';
                    print '</ul>';
                print '</div>';
                print '<div class="menu">';
                    print '<button class="boton">ALQUILERES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="index.php"><li>Inicio</li></a>';
                        print '<a href="./alquiler/listar.php"><li>Listar</li></a>';
                   print '</ul>';
                print '</div>';
                print '<div class="auth-buttons">';
                            print '<a class="login" href="./login/logout.php"><button>Cerrar Sesión</button></a>';
                        print '</div>';
            }
            elseif($_SESSION['tipo'] === 'adm')
            {
                {
                    print '<div class="menu">';
                        print '<button class="boton">COCHES</button>';
                        print '<ul class="boton-opciones">';
                            print '<a href="index.php"><li>Inicio</li></a>';
                            print '<a href="./coches/añadir.php"><li>Añadir</li></a>';
                            print '<a href="./coches/borrar.php"><li>Eliminar</li></a>';
                            print '<a href="./coches/modificar.php"><li>Modificar</li></a>';
                            print '<a href="./coches/listar.php"><li>Listar</li></a>';
                            print '<a href="./coches/buscar.php"><li>Buscar</li></a>';
                        print '</ul>';
                    print '</div>';
                    print '<div class="menu">';
                        print '<button class="boton">ALQUILERES</button>';
                        print '<ul class="boton-opciones">';
                            print '<a href="index.php"><li>Inicio</li></a>';
                            print '<a href="./alquiler/listar.php"><li>Listar</li></a>';
                            print '<a href="./alquiler/borrar.php"><li>Borrar</li></a>';
                       print '</ul>';
                    print '</div>';
                    print '<div class="menu">';
                        print '<button class="boton">USUARIOS</button>';
                        print '<ul class="boton-opciones">';
                            print '<a href="index.php"><li>Inicio</li></a>';
                            print '<a href="./usuario/añadir.php"><li>Añadir</li></a>';
                            print '<a href="./usuario/borrar.php"><li>Eliminar</li></a>';
                            print '<a href="./usuario/modificar.php"><li>Modificar</li></a>';
                            print '<a href="./usuario/listar.php"><li>Listar</li></a>';
                            print '<a href="./usuario/buscar.php"><li>Buscar</li></a>';
                            print '<a href="./usuario/buscar.php"><li>Buscar</li></a>';
                       print '</ul>';
                    print '</div>';
                    print '<div class="auth-buttons">';
                                print '<a class="login" href="./login/logout.php"><button>Cerrar Sesión</button></a>';
                            print '</div>';
                }
            }
            else 
            {
                print '<div class="menu">';
                    print '<button class="boton">COCHES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="index.php"><li>Inicio</li></a>';
                        print '<a href="./coches/listar.php"><li>Listar</li></a>';
                        print '<a href="./coches/buscar.php"><li>Buscar</li></a>';
                    print '</ul>';
                print '</div>';
                print '<div class="menu">';
                    print '<button class="boton">ALQUILERES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="index.php"><li>Inicio</li></a>';
                        print '<a href="./alquiler/listar.php"><li>Listar</li></a>';
                   print '</ul>';
                print '</div>';
                print '<div class="auth-buttons">';
                    print '<a class="login" href="./login/registro.php"><button>Registrar</button><a>';
                    print '<a class="login" href="./login/login.php"><button>Iniciar Sesión</button><a>';
                print '</div>';
            }
        ?>
    </div>
</div>
</body>
</html>

