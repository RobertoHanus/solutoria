<?php

include('db.php');

$valor = $_POST['valor'];
$date = $_POST['date'];
$source = $_POST['source'];

if ($date == "" || $source == "") {
    echo "Faltan datos para la creación.";
    return;
}

$date = date('Y-m-d', strtotime(str_replace("/", "-", $date)));

$query = "INSERT INTO uf_entries(id,valor,fecha,origen) VALUES (NULL,$valor,'$date','$source');";

mysqli_query($conn, $query);

echo "Registro creado!";
?>