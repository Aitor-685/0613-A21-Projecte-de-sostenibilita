<?php
session_start();
$usuari = $_SESSION['usuari'] ?? null;
$esAdmin = isset($usuari) && $usuari['rol'] === 'admin';
include("../includes/head.html");
include("../includes/menu.php");
?>

<section class="hero hero-petit">
    <div class="hero-text">
        <h1>Productes Sostenibles</h1>
        <p>Explora la nostra selecció de productes per a comunitats més verdes</p>
    </div>
</section>

<!-- MISSATGES -->
<?php if (isset($_GET['ok'])): ?>
    <div class="missatge-ok container">
        <?php
            $oks = [
                'creat'    => 'Producte creat correctament.',
                'editat'   => 'Producte actualitzat correctament.',
                'eliminat' => 'Producte eliminat correctament.',
            ];
            echo $oks[$_GET['ok']] ?? 'Operació completada.';
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <div class="missatge-error container">
        <?php
            $errors = [
                'camps_buits' => 'Omple tots els camps obligatoris.',
                'id_invalid' => 'Producte no trobat.',
                'error_bd' => 'Error de base de dades.',
                'accio_invalida'=> ' Acció no reconeguda.',
            ];
            echo $errors[$_GET['error']] ?? 'Error desconegut.';
        ?>
    </div>
<?php endif; ?>

<!-- FORMULARI CREAR (només admin) -->
<?php if ($esAdmin): ?>
<div class="container" id="formCrear" style="display:none;">
    <h3>➕ Nou Producte</h3>
    <form action="/controller/productes/router.php" method="POST" class="form-gestio">
        <input type="hidden" name="accio" value="crear">
        <div class="form-grid">
            <div class="camp">
                <label>Nom *</label>
                <input type="text" name="nom" required>
            </div>
            <div class="camp">
                <label>Preu (€) *</label>
                <input type="number" name="preu" step="0.01" min="0" required>
            </div>
            <div class="camp">
                <label>Categoria *</label>
                <select name="categoria_id" id="selectCategoriaCrear" required>
                    <option value="">Selecciona...</option>
                </select>
            </div>
            <div class="camp">
                <label>Valoració (0-5)</label>
                <input type="number" name="valoracio" step="0.1" min="0" max="5" value="0">
            </div>
            <div class="camp camp-ample">
                <label>Descripció</label>
                <textarea name="descripcio" rows="3"></textarea>
            </div>
            <div class="camp camp-ample">
                <label>URL Imatge</label>
                <input type="text" name="imatge" placeholder="https://...">
            </div>
        </div>
        <div class="form-accions">
            <button type="submit" class="btn-editar">Guardar</button>
            <button type="button" class="btn-eliminar" onclick="tancarFormCrear()">✖ Cancel·lar</button>
        </div>
    </form>
</div>


<?php endif; ?>

<div class="container-productes">
    <!-- FILTRES -->
    <aside class="filtres">
        <h3>🔍 Filtres</h3>
        <div class="filtre-grup">
            <label for="filtreCategoria">Categoria</label>
            <select id="filtreCategoria">
                <option value="totes">Totes</option>
            </select>
        </div>
        <div class="filtre-grup">
            <label>Preu màxim: <span id="valorPreu">1000</span>€</label>
            <input type="range" id="filtrePreu" min="0" max="1000" value="1000" step="10">
        </div>
        <div class="filtre-grup">
            <label>Valoració mínima</label>
            <div class="estrelles-filtre">
                <button class="btn-estrella" data-valor="0">Totes</button>
                <button class="btn-estrella" data-valor="1">⭐ 1+</button>
                <button class="btn-estrella" data-valor="2">⭐ 2+</button>
                <button class="btn-estrella" data-valor="3">⭐ 3+</button>
                <button class="btn-estrella" data-valor="4">⭐ 4+</button>
            </div>
        </div>
        <button id="btnReset" class="btn-reset">↺ Reiniciar filtres</button>

        <?php if ($esAdmin): ?>
            <button class="btn-nou-producte" onclick="obrirFormCrear()">Nou producte</button>
        <?php endif; ?>
    </aside>

    <!-- PRODUCTES -->
    <main>
        <div class="resulats-bar">
            <span id="numResultats">Carregant...</span>
        </div>
        <div class="llistat-productes" id="llistaProductes">
            <p>Carregant productes...</p>
        </div>
    </main>
</div>

<script>
    const esAdmin = <?= $esAdmin ? 'true' : 'false' ?>;
    let categoriesData = [];
</script>
<script src="/js/filtres.js"></script>

<?php include("../includes/foot.html"); ?>