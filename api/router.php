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
    'productes'      => __DIR__ . '/productes.php',
    'sostenibilitat' => __DIR__ . '/sostenibilitat.php',
];
// 'router.php' delega les crides API a productes.php o sostenibilitat.php segons el paràmetre tipus.

if (!array_key_exists($tipus, $rutes)) {
    http_response_code(404);
    echo json_encode(['error' => "Tipus '$tipus' no reconegut"]);
    exit;
}

require $rutes[$tipus];