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
$_SESSION['iduser'] = mysqli_real_escape_string($conn,$_REQUEST["id"]);
$iduser=$_SESSION['iduser'];
$sql = "SELECT * FROM usuarios WHERE id_usuario='$iduser'";
$consulta = mysqli_query ($conn,$sql);
$nfilas = mysqli_num_rows ($consulta);
$row = mysqli_fetch_assoc($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Modificar</title>
    <link rel="icon" href="../img/link.jpg" type="image/x-icon">
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
        .error {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
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
                        print '<a href="../coches/listar.php"><li>Listar</li></a>';
                        print '<a href="../coches/buscar.php"><li>Buscar</li></a>';
                    print '</ul>';
                print '</div>';
                print '<div class="menu">';
                    print '<button class="boton">ALQUILERES</button>';
                    print '<ul class="boton-opciones">';
                        print '<a href="../index.php"><li>Inicio</li></a>';
                        print '<a href="../alquiler/listar.php"><li>Listar</li></a>';
                        print '<a href="../alquiler/alquilar.php"><li>Alquilar</li></a>';
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
                        print '<a href="../alquiler/listar.php"><li>Listar</li></a>';
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
                            print '<a href="../alquiler/listar.php"><li>Listar</li></a>';
                            print '<a href="../alquiler/borrar.php"><li>Borrar</li></a>';
                       print '</ul>';
                    print '</div>';
                    print '<div class="menu">';
                        print '<button class="boton">USUARIOS</button>';
                        print '<ul class="boton-opciones">';
                            print '<a href="../index.php"><li>Inicio</li></a>';
                            print '<a href="./añadir.php"><li>Añadir</li></a>';
                            print '<a href="./borrar.php"><li>Eliminar</li></a>';
                            print '<a href="./modificar.php"><li>Modificar</li></a>';
                            print '<a href="./listar.php"><li>Listar</li></a>';
                            print '<a href="./buscar.php"><li>Buscar</li></a>';
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
                        print '<a href="../listar.php"><li>Listar</li></a>';
                        print '<a href="../buscar.php"><li>Buscar</li></a>';
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
<div id="elform">
    <h1>Modificar Usuario</h1><br>
    <?php
        echo '<form action="./modificar-proceso.php" method="post">';
        if (ISSET($_SESSION['error']))
            {
                print '<p class="error">' . $_SESSION['error'] . '</p>';
                unset($_SESSION['error']);
            }
        echo '<label class="letras">Nombre(' . $row["nombre"] . '):</label><br><input type="text" name="nombre"><br><br>';
        echo '<label class="letras">Apellidos(' . $row["apellidos"] . '):</label> <br><input type="text" name="apellidos"><br><br>';
        echo '<label class="letras">DNI(' . $row["dni"] .'):</label> <br><input type="text" name="dni"><br><br>';
        echo  '<label class="letras">Saldo(' . $row["saldo"] .'):</label> <br><input type="number" name="saldo"><br><br>';
        echo '<input type="submit" value="Modificar Usuario" id="botones">';
        echo '</form>';
    ?>
</div>
</body>
</html>