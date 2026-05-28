<?php
$id          = (int) ($_POST['id'] ?? 0);
$nom         = trim($_POST['nom'] ?? '');
$descripcio  = trim($_POST['descripcio'] ?? '');
$preu        = (float) ($_POST['preu'] ?? 0);
$imatge      = trim($_POST['imatge'] ?? '');
$valoracio   = (float) ($_POST['valoracio'] ?? 0);
$categoria_id = (int) ($_POST['categoria_id'] ?? 0);

if (!$id || !$nom || !$preu || !$categoria_id) {
    header('Location: /view/products.php?error=camps_buits');
    exit;
}

try {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        UPDATE productes
        SET nom = ?, descripcio = ?, preu = ?, imatge = ?, valoracio = ?, categoria_id = ?
        WHERE id = ?
    ');
    $stmt->execute([$nom, $descripcio, $preu, $imatge, $valoracio, $categoria_id, $id]);
    header('Location: /view/products.php?ok=editat');
} catch (Exception $e) {
    header('Location: /view/products.php?error=error_bd');
}
exit;