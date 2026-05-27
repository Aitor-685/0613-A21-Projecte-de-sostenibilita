<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// ?tipus=productes
// ?tipus=sostenibilitat
// ?tipus=sostenibilitat&grafic=urbanitzacio

$tipus = $_GET['tipus'] ?? null;

if (!$tipus) {
    http_response_code(400);
    echo json_encode(['error' => 'Cal especificar el paràmetre tipus']);
    exit;
}

$rutes = [
    'productes'      => __DIR__ . '/../view/productes.php',
    'sostenibilitat' => __DIR__ . '/../view/sostenibilitat.php',
];

if (!array_key_exists($tipus, $rutes)) {
    http_response_code(404);
    echo json_encode(['error' => "Tipus '$tipus' no reconegut"]);
    exit;
}

if ($tipus === 'sostenibilitat' && isset($_GET['grafic'])) {
    require __DIR__ . '/datos.php';
    exit;
}

// Passar els paràmetres restants al fitxer corresponent
require $rutes[$tipus];