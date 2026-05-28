<?php
$id = (int) ($_POST['id'] ?? $_GET['id'] ?? 0);

if (!$id) {
    header('Location: /view/productes.php?error=id_invalid');
    exit;
}

try {
    $pdo  = getDB();
    $stmt = $pdo->prepare('DELETE FROM productes WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: /view/productes.php?ok=eliminat');
} catch (Exception $e) {
    header('Location: /view/productes.php?error=error_bd');
}
exit;