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
$sql = "DELETE FROM coches WHERE id_coche IN ($ids_to_delete)";
if (mysqli_query($conn, $sql))
{
    header('Location: ./listar.php');
}