<?php
$usuari = null;
include("../includes/head.html");
include("../includes/menu.php");
?>

<section class="hero hero-petit">
    <div class="hero-text">
        <h1>Productes Sostenibles</h1>
        <p>Explora la nostra selecció de productes per a comunitats més verdes</p>
    </div>
</section>

<div class="container-productes">

    <!-- FILTRES -->
    <aside class="filtres">
        <h3>Filtres</h3>

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

<?php include("includes/foot.html"); ?>