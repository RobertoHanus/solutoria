<?php

include('db.php');


$query = "DELETE FROM uf_entries;";

mysqli_query($conn, $query);

echo "BD borrada!";
?>