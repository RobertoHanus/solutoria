<?php

include('db.php');


$query = "SELECT * FROM uf_entries;";

$result = mysqli_query($conn, $query);
?>

<?php
$all_view = array();
while ($row = mysqli_fetch_array($result)) {
    $view_row = array();
    array_push($view_row,$row['valor'],$row['fecha'],$row['origen']);
    array_push($all_view, $view_row);
}

echo json_encode($all_view);
?>