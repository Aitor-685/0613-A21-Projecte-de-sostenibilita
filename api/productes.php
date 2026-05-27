<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . '/../controller/db.php';

try {
    $pdo = getDB();

    // ?categories=all → retorna totes les categories
    if (isset($_GET['categories'])) {
        $stmt = $pdo->query('SELECT nom FROM categories ORDER BY nom');
        echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
        exit;
    }

    // ?categoria=Energia Solar → filtra per categoria
    // ?preu_max=500          → filtra per preu
    // ?valoracio_min=4       → filtra per valoració
    $sql    = '
        SELECT p.*, c.nom AS category
        FROM productes p
        JOIN categories c ON p.categoria_id = c.id
        WHERE 1=1
    ';
    $params = [];

    if (!empty($_GET['categoria']) && $_GET['categoria'] !== 'totes') {
        $sql     .= ' AND c.nom = ?';
        $params[] = $_GET['categoria'];
    }

    if (!empty($_GET['preu_max'])) {
        $sql     .= ' AND p.preu <= ?';
        $params[] = (float) $_GET['preu_max'];
    }

    if (!empty($_GET['valoracio_min'])) {
        $sql     .= ' AND p.valoracio >= ?';
        $params[] = (float) $_GET['valoracio_min'];
    }

    $sql .= ' ORDER BY p.nom';

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $productes = $stmt->fetchAll();

    // Adaptem el format per compatibilitat amb el JS existent
    $result = array_map(fn($p) => [
        'id'       => $p['id'],
        'title'    => $p['nom'],
        'price'    => $p['preu'],
        'description' => $p['descripcio'],
        'image'    => $p['imatge'],
        'category' => $p['category'],
        'rating'   => [
            'rate'  => $p['valoracio'],
            'count' => $p['num_valoracions']
        ]
    ], $productes);

    echo json_encode($result);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error de base de dades']);
}