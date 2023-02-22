<?php

include('db.php');

$id = $_POST['id'];

$query = "DELETE FROM uf_entries WHERE id = $id;";

mysqli_query($conn, $query);

echo "BD borrada!";
?>