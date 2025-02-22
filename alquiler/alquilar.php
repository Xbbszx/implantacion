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
$sql = "SELECT * FROM coches WHERE alquilado = 0";
$consulta = mysqli_query ($conn,$sql);
$nfilas = mysqli_num_rows ($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/link.jpg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler - Alquilar</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(../img/otrofondo.jpg);
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
        .td img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .td {
            padding: 0;
            width: 1px; 
            white-space: nowrap;
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
<div id="header">
    <span id="span">Concesionario Jareño</span>
    <div class="menu-container">
    <?php
            if($_SESSION['tipo'] === 'com')
            {
                print '<div class="menu">';
                    print '<button class="boton">COCHES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="../index.php"><li>Inicio</li></a>';
                        print '<a href="./listar.php"><li>Listar</li></a>';
                        print '<a href="./buscar.php"><li>Buscar</li></a>';
                    print '</ul>';
                print '</div>';
                print '<div class="menu">';
                    print '<button class="boton">ALQUILERES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="../index.php"><li>Inicio</li></a>';
                        print '<a href="./listar.php"><li>Listar</li></a>';
                        print '<a href="./alquilar.php"><li>Alquilar</li></a>';
                   print '</ul>';
                print '</div>';
                        print '<div class="auth-buttons">';
                            print '<a class="login" href="../login/logout.php"><button>Cerrar Sesión</button></a>';
                        print '</div>';
            }
            elseif($_SESSION['tipo'] === 'usr')
            {
                print '<div class="menu">';
                    print '<button class="boton">COCHES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="../index.php"><li>Inicio</li></a>';
                        print '<a href="../coches/añadir.php"><li>Añadir</li></a>';
                        print '<a href="../coches/listar.php"><li>Listar</li></a>';
                        print '<a href="../coches/buscar.php"><li>Buscar</li></a>';
                    print '</ul>';
                print '</div>';
                print '<div class="menu">';
                    print '<button class="boton">ALQUILERES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="../index.php"><li>Inicio</li></a>';
                        print '<a href="./listar.php"><li>Listar</li></a>';
                   print '</ul>';
                print '</div>';
                print '<div class="auth-buttons">';
                            print '<a class="login" href="../login/logout.php"><button>Cerrar Sesión</button></a>';
                        print '</div>';
            }
            elseif($_SESSION['tipo'] === 'adm')
            {
                {
                    print '<div class="menu">';
                        print '<button class="boton">COCHES</button>';
                        print '<ul class="boton-opciones">';
                            print '<a href="../index.php"><li>Inicio</li></a>';
                            print '<a href="../coches/añadir.php"><li>Añadir</li></a>';
                            print '<a href="../coches/borrar.php"><li>Eliminar</li></a>';
                            print '<a href="../coches/modificar.php"><li>Modificar</li></a>';
                            print '<a href="../coches/listar.php"><li>Listar</li></a>';
                            print '<a href="../coches/buscar.php"><li>Buscar</li></a>';
                        print '</ul>';
                    print '</div>';
                    print '<div class="menu">';
                        print '<button class="boton">ALQUILERES</button>';
                        print '<ul class="boton-opciones">';
                            print '<a href="../index.php"><li>Inicio</li></a>';
                            print '<a href="./listar.php"><li>Listar</li></a>';
                            print '<a href="./borrar.php"><li>Borrar</li></a>';
                       print '</ul>';
                    print '</div>';
                    print '<div class="menu">';
                        print '<button class="boton">USUARIOS</button>';
                        print '<ul class="boton-opciones">';
                            print '<a href="../index.php"><li>Inicio</li></a>';
                            print '<a href="../usuario/añadir.php"><li>Añadir</li></a>';
                            print '<a href="../usuario/borrar.php"><li>Eliminar</li></a>';
                            print '<a href="../usuario/modificar.php"><li>Modificar</li></a>';
                            print '<a href="../usuario/listar.php"><li>Listar</li></a>';
                            print '<a href="../usuario/buscar.php"><li>Buscar</li></a>';
                       print '</ul>';
                    print '</div>';
                    print '<div class="auth-buttons">';
                                print '<a class="login" href="../login/logout.php"><button>Cerrar Sesión</button></a>';
                            print '</div>';
                }
            }
            else 
            {
                print '<div class="menu">';
                    print '<button class="boton">COCHES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="../index.php"><li>Inicio</li></a>';
                        print '<a href="../coches/listar.php"><li>Listar</li></a>';
                        print '<a href="../coches/buscar.php"><li>Buscar</li></a>';
                    print '</ul>';
                print '</div>';
                print '<div class="menu">';
                    print '<button class="boton">ALQUILERES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="../index.php"><li>Inicio</li></a>';
                        print '<a href="../alquiler/listar.php"><li>Listar</li></a>';
                   print '</ul>';
                print '</div>';
                print '<div class="auth-buttons">';
                    print '<a class="login" href="../login/registro.php"><button>Registrar</button><a>';
                    print '<a class="login" href="../login/login.php"><button>Iniciar Sesión</button><a>';
                print '</div>';
            }
        ?>
    </div>
</div>
</div>
<?php
echo "<div id='elform'>";
echo "<form action='./alquilar-proceso.php' method='POST'>";
    print ("<table class='tabla'>\n");
    print ("<tr>\n");
    print ("<th class='table-th'>Alquilar</th>\n");
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
    print ("<td class='td'><input type='checkbox' name='alquilar' value='" . $row['id_coche'] . "'></td>");
    print ("<td class='td'>" . htmlspecialchars($row['modelo']) . "</td>\n");
    print ("<td class='td'>" . htmlspecialchars($row['marca']) . "</td>\n");
    print ("<td class='td'>" . htmlspecialchars($row['color']) . "</td>\n");
    print ("<td class='td'>" . htmlspecialchars($row['precio']) . "</td>\n");
    print ("<td class='td'>No Alquilado</td>\n");
    print ("<td class='td'><img src='" . $row['foto'] . "'></td>\n");
    print ("</tr>\n");
    }
    print ("</table><br>\n");
    echo "<div id='sigma'>";
    echo "<input type='submit' value='Alquilar' id='botones'>";
    echo "</div>";
    echo "</form>";
?>
</div>
</html>