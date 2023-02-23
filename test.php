<?php
$ch  = curl_init();

$data = array("userName" => "robertohanus4_94p@indeedemail.com", "flagJson" => true );

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

curl_close($ch);

$ch  = curl_init();

$options = [
    CURLOPT_URL => 'https://postulaciones.solutoria.cl/api/indicadores',
    CURLOPT_POST => false,
    CURLOPT_HTTPHEADER => ["Accept: application/json", "Content-Type: application/json", "Authorization: Bearer $token"],
    CURLOPT_RETURNTRANSFER => true
 ];

curl_setopt_array($ch, $options);

$resultData = curl_exec($ch);

$decodedData = json_decode($resultData, true);

// var_dump($decodedData[0]);

foreach($decodedData as $row) {
    if($row['codigoIndicador'] == "UF") var_dump($row);
}

curl_close($ch);
?>