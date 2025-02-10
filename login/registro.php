<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
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
            height: 400px;
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
                <a href="../coches/listar.php"><li>Listar</li></a>
                <a href="../coches/buscar.php"><li>Buscar</li></a>
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
            <a class="login" href="./registro.php"><button>Registrar</button><a>
            <a class="login" href="./login.php"><button>Iniciar Sesión</button><a>
        </div>
    </div>
</div>
<div id="elform">
    <form action="./registro-proceso.php" method="post">
        <label for="nombre" class="letras">Nombre:</label><br><input type="text" name="nombre"><br><br>
        <label for="apellido" class="letras">Apellido:</label> <br><input type="text" name="apellido"><br><br>
        <label for="contraseña" class="letras">Contraseña:</label> <br><input type="password" name="password"><br><br>
        <label for="DNI" class="letras">DNI:</label> <br><input type="text" name="dni"><br><br>
        <label>Comprador</label> <input type="radio" name="tipo" value="com">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Vendedor</label> <input type="radio" name="tipo" value="usr"><br><br>
        <input type="submit" value="Registrarse" id="botones">
    </form>
</div>
</body>
</html>