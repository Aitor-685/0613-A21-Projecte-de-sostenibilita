<?php
$id = (int) ($_POST['id'] ?? $_GET['id'] ?? 0);

if (!$id) {
    header('Location: /view/products.php?error=id_invalid');
    exit;
}

try {
    $pdo  = getDB();
    $stmt = $pdo->prepare('DELETE FROM productes WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: /view/products.php?ok=eliminat');
} catch (Exception $e) {
    header('Location: /view/products.php?error=error_bd');
}
exit;