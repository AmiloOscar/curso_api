<?php

define('API_BASE', 'http://localhost:8080/curso_api/aula_04/api/index.php?option=');

echo '<p>APLICAÇÃO</p>';

for($i=0; $i<10; $i++)
{
    $resultado = api_request('random');

    //verify if response is ok (success)
    if($resultado['status'] == 'ERROR'){
        die('Aconteceu um erro na minha chamada a API.');
    }

    echo "O valor randómico: " . $resultado['data'] . "<br>";
}

echo 'TERMINADO';

function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    return json_decode($response, true);
}