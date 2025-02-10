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
        #elform {
            padding-top: 50px;
            background-color: white;
            width: 30%;
            height: 370px;
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
<div id="elform">
    <form action="./buscar-proceso.php" method="post">
        <label for="modelo" class="letras">Modelo:</label><br><input type="text" name="modelo"><br><br>
        <label for="marca" class="letras">Marca:</label> <br><input type="text" name="marca"><br><br>
        <label for="color" class="letras">Color:</label> <br><input type="text" name="color"><br><br>
        <label for="precio" class="letras">Precio:</label> <br><input type="number" name="precio"><br><br>
        <input type="submit" value="Buscar Coche" id="botones">
    </form>
</div>
</body>
</html>