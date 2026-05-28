<?php
session_start();
$usuari = $_SESSION['usuari'] ?? null;
if (!$usuari || $usuari['rol'] !== 'admin') {
    header('Location: /view/login.php');
    exit;
}

require_once __DIR__ . '/../controller/connecio.php';
$pdo = getDB();

$id = (int) ($_GET['id'] ?? 0);
if (!$id) {
    header('Location: /view/products.php?error=id_invalid');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM productes WHERE id = ?');
$stmt->execute([$id]);
$product = $stmt->fetch();
if (!$product) {
    header('Location: /view/products.php?error=id_invalid');
    exit;
}

$categories = $pdo->query('SELECT id, nom FROM categories ORDER BY nom')->fetchAll();

include(__DIR__ . '/../includes/head.html');
include(__DIR__ . '/../includes/menu.php');
?>

<section class="hero hero-petit">
    <div class="hero-text">
        <h1>Editar Producte</h1>
        <p>Modifica les dades del producte i desa els canvis amb el controlador.</p>
    </div>
</section>

<div class="container">
    <div class="form-gestio">
        <h2>Editar: <?= htmlspecialchars($product['nom']) ?></h2>
        <form action="/controller/productes/router.php" method="POST" class="form-gestio">
            <input type="hidden" name="accio" value="editar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
            <div class="form-grid">
                <div class="camp">
                    <label>Nom *</label>
                    <input type="text" name="nom" value="<?= htmlspecialchars($product['nom']) ?>" required>
                </div>
                <div class="camp">
                    <label>Preu (€) *</label>
                    <input type="number" name="preu" step="0.01" min="0" value="<?= htmlspecialchars($product['preu']) ?>" required>
                </div>
                <div class="camp">
                    <label>Categoria *</label>
                    <select name="categoria_id" required>
                        <option value="">Selecciona...</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= htmlspecialchars($cat['id']) ?>" <?= $cat['id'] == $product['categoria_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['nom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="camp">
                    <label>Valoració (0-5)</label>
                    <input type="number" name="valoracio" step="0.1" min="0" max="5" value="<?= htmlspecialchars($product['valoracio']) ?>">
                </div>
                <div class="camp camp-ample">
                    <label>Descripció</label>
                    <textarea name="descripcio" rows="3"><?= htmlspecialchars($product['descripcio']) ?></textarea>
                </div>
                <div class="camp camp-ample">
                    <label>URL Imatge</label>
                    <input type="text" name="imatge" value="<?= htmlspecialchars($product['imatge']) ?>" placeholder="https://...">
                </div>
            </div>
            <div class="form-accions">
                <button type="submit" class="btn-editar">Guardar canvis</button>
                <a class="btn-eliminar" href="/view/products.php">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php include(__DIR__ . '/../includes/foot.html'); ?>
