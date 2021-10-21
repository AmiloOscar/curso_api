<?php

define('API_BASE', 'http://localhost:8080/curso_api/aula_04/api/index.php?option=');

echo '<p>APLICAÇÃO</p>';

$resultado = api_request('status');

echo '<pre>';
print_r($resultado);

function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    return json_decode($response, true);
}