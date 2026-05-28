<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$dataFile = __DIR__ . '/../data/sostenibilidad.json';

if (!file_exists($dataFile)) {
    http_response_code(404);
    echo json_encode(['error' => 'Fitxer de dades no trobat']);
    exit;
}

$data = json_decode(file_get_contents($dataFile), true);

// Si demanen un gràfic concret: ?grafic=urbanitzacio
if (isset($_GET['grafic'])) {
    $grafic = $_GET['grafic'];
    if (array_key_exists($grafic, $data)) {
        echo json_encode($data[$grafic]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => "Gràfic '$grafic' no trobat"]);
    }
    exit;
}

// Si demanen tots: ?all=true
echo json_encode($data);