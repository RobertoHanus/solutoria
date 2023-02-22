<?php

include('db.php');

$inicio=$_POST['inicio'];
$inicio = date('Y-m-d', strtotime(str_replace("/", "-", $inicio)));
$termino=$_POST['termino'];
$termino = date('Y-m-d', strtotime(str_replace("/", "-", $termino)));

$query = "SELECT * FROM uf_entries WHERE fecha >= '$inicio' AND fecha <= '$termino';";

$result = mysqli_query($conn, $query);
?>

<?php
$all_view = array();
while ($row = mysqli_fetch_array($result)) {
    $view_row = array();
    array_push($view_row,$row['id'],$row['valor'],$row['fecha'],$row['origen']);
    array_push($all_view, $view_row);
}

echo json_encode($all_view);
?>