<nav class="menu">
    <div class="logo">
        <a href="/index.php">
            <span class="logo-text">EcoCity</span>
        </a>
    </div>
    <div class="links">
        <a href="/index.php">Inici</a>
        <a href="/view/sostenibilidad.php">Sostenibilitat</a>
        <a href="/view/products.php?categoria=totes">Productes</a>
        <?php if (isset($usuari) && $usuari): ?>
            <a href="/view/gestionarProducts.php">Gestionar productes</a>
            <a href="/view/gestionarCategories.php">Gestionar categories</a>
            <a href="/view/gestionarUsuaris.php">Gestionar usuaris</a>
            <span class="usuari-nom">👤 <?= htmlspecialchars($usuari["nom"]) ?></span>
            <a href="/controller/logout.php">Logout</a>
        <?php else: ?>
            <a href="/view/login.php" class="btn-login">🔑 Login</a>
        <?php endif; ?>
    </div>
</nav>