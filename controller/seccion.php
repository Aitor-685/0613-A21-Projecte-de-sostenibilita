<?php
session_start();
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /view/login.php');
    exit;
}

$usuari      = trim($_POST['usuari'] ?? '');
$contrasenya = trim($_POST['contrasenya'] ?? '');

if (!$usuari || !$contrasenya) {
    header('Location: /view/login.php?error=buits');
    exit;
}

try {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT * FROM usuaris WHERE nom = ?');
    $stmt->execute([$usuari]);
    $user = $stmt->fetch();

    // TODO: quan tinguem hash fer servir password_verify()
    if ($user && $user['contrasenya'] === $contrasenya) {
        $_SESSION['usuari'] = [
            'id'  => $user['id'],
            'nom' => $user['nom'],
            'rol' => $user['rol']
        ];
        header('Location: /view/productes.php');
    } else {
        header('Location: /view/login.php?error=incorrectes');
    }
} catch (Exception $e) {
    header('Location: /view/login.php?error=connexio');
}
exit;