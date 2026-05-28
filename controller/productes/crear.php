<?php
$nom         = trim($_POST['nom'] ?? '');
$descripcio  = trim($_POST['descripcio'] ?? '');
$preu        = (float) ($_POST['preu'] ?? 0);
$imatge      = trim($_POST['imatge'] ?? '');
$valoracio   = (float) ($_POST['valoracio'] ?? 0);
$categoria_id = (int) ($_POST['categoria_id'] ?? 0);

if (!$nom || !$preu || !$categoria_id) {
    header('Location: /view/products.php?error=camps_buits');
    exit;
}

try {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        INSERT INTO productes (nom, descripcio, preu, imatge, valoracio, categoria_id)
        VALUES (?, ?, ?, ?, ?, ?)
    ');
    $stmt->execute([$nom, $descripcio, $preu, $imatge, $valoracio, $categoria_id]);
    header('Location: /view/products.php?ok=creat');
} catch (Exception $e) {
    header('Location: /view/products.php?error=error_bd');
}
exit;