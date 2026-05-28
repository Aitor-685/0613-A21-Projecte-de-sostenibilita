<?php
session_start();
require_once __DIR__ . '/../connecio.php';

// Només admin pot fer accions
if (!isset($_SESSION['usuari']) || $_SESSION['usuari']['rol'] !== 'admin') {
    http_response_code(403);
    header('Location: /view/login.php');
    exit;
}

$accio = $_POST['accio'] ?? $_GET['accio'] ?? null;

switch ($accio) {
    case 'crear':
        require __DIR__ . '/crear.php';
        break;
    case 'editar':
        require __DIR__ . '/editar.php';
        break;
    case 'eliminar':
        require __DIR__ . '/eliminar.php';
        break;
    default:
        http_response_code(400);
        header('Location: /view/productes.php?error=accio_invalida');
        exit;
}