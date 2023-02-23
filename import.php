<?php
include('db.php');

$userName = $_POST['userName'];

if($userName == "") {
    echo "Debe incluir nombre de usuario valido.";
    return;
}

$ch = curl_init();

$data = array("userName" => "$userName", "flagJson" => true);

$postdata = json_encode($data);

$options = [
    CURLOPT_URL => 'https://postulaciones.solutoria.cl/api/acceso',
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ["Accept: application/json", "Content-Type: application/json"],
    CURLOPT_POSTFIELDS => $postdata,
    CURLOPT_RETURNTRANSFER => true
];

curl_setopt_array($ch, $options);

$result = curl_exec($ch);

$decoded = json_decode($result, true);

$token = $decoded['token'];

if(isset($token)==false) {
    echo "Nombre de usuario invalido";
    return;
}

curl_close($ch);

$ch = curl_init();

$options = [
    CURLOPT_URL => 'https://postulaciones.solutoria.cl/api/indicadores',
    CURLOPT_POST => false,
    CURLOPT_HTTPHEADER => ["Accept: application/json", "Content-Type: application/json", "Authorization: Bearer $token"],
    CURLOPT_RETURNTRANSFER => true
];

curl_setopt_array($ch, $options);

$resultData = curl_exec($ch);

$decodedData = json_decode($resultData, true);

curl_close($ch);

$valor = 0;
$fecha = '';
$origen = '';

foreach ($decodedData as $row) {
    if ($row['codigoIndicador'] == "UF") {
        $valor = $row['valorIndicador'];
        $fecha = $row['fechaIndicador'];
        $origen = $row['origenIndicador'];   

        $query = "INSERT INTO uf_entries(id,valor,fecha,origen) VALUES (NULL,$valor,'$fecha','$origen');";

        mysqli_query($conn, $query);
    }
}

echo "Datos importados!";

?>