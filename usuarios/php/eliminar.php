<?php
$conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_REQUEST['delete_ids']) && is_array($_REQUEST['delete_ids']))
{
    $ids_to_delete = implode(",", array_map('intval', $_REQUEST['delete_ids']));
}
$sql = "DELETE FROM usuarios WHERE id_usuario IN ($ids_to_delete)";
if (mysqli_query($conn, $sql))
{
    $sql2 = "SELECT * FROM usuarios";
    $consulta = mysqli_query ($conn,$sql2);
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
            </style>
            </head>
    <body>
    
    <div id='header'>
        <span id='span'>Concesionario Jareño</span>
        <div class='menu'>
            <button class='boton'>COCHES</button>
            <ul class='boton-opciones'>
                <a href='../../index.html'><li>Inicio</li></a>
                <a href='../../coches/coches-index.html'><li>Añadir</li></a>
                <a href='../../coches/php/listar-coche.php'><li>Listar</li></a>
                <a href='../../coches/buscar.html'><li>Buscar</li></a>
                <a href=''><li>Modificar</li></a>
                <a href='../../coches/php/borrar-coche.php'><li>Borrar</li></a>
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
    <div id='elform'>";
        print ("<table class='tabla'>\n");
        print ("<tr>\n");
        print ("<th class='table-th'>Nombre</th>\n");
        print ("<th class='table-th'>Apellido</th>\n");
        print ("<th class='table-th'>Contraseña</th>\n");
        print ("<th class='table-th'>DNI</th>\n");
        print ("<th class='table-th'>Saldo</th>\n");
        print ("</tr>\n");
        for ($i=0; $i<$nfilas; $i++)
        {
        $resultado = mysqli_fetch_array ($consulta);
        print ("<tr>\n");
        print ("<td class='td'>" . $resultado['nombre'] . "</td>\n");
        print ("<td class='td'>" . $resultado['apellido'] . "</td>\n");
        print ("<td class='td'>" . $resultado['password'] . "</td>\n");
        print ("<td class='td'>" . $resultado['dni'] . "</td>\n");
        print ("<td class='td'>" . $resultado['saldo'] . "</td>\n");
        print ("</tr>\n");
        }
    
        print ("</table>\n");
    echo "</div>
    </html>";
    mysqli_close($conn);
}
?>