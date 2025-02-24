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
$sql = "UPDATE alquileres SET devuelto=NOW() WHERE id_coche IN ($ids_to_delete)";
if (mysqli_query($conn, $sql))
{
    $sql2="UPDATE coches SET alquilado=0 WHERE id_coche IN ($ids_to_delete)";
    if (mysqli_query($conn, $sql2))
    {
        header('Location: ./listar.php');
    }
}