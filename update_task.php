<?php

include('db.php');

$id = $_POST['id'];
$valor = $_POST['valor'];
$date = $_POST['date'];
$source = $_POST['source'];

$date = date('Y-m-d', strtotime(str_replace("/", "-", $date)));

$query = "UPDATE uf_entries SET valor=$valor, fecha = '$date', origen = '$source' WHERE id = $id";

mysqli_query($conn, $query);

echo "Registro actualizado!";
?>