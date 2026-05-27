<?php
$usuari = null;
include("../includes/head.html");
include("../includes/menu.php");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>

<section class="hero hero-petit">
    <div class="hero-text">
        <h1>🎯 ODS 11 · Ciutats i Comunitats Sostenibles</h1>
        <p>Dades reals de l'ONU per entendre el repte urbà global</p>
    </div>
</section>

<!-- XIFRES CLAU -->
<section class="seccio">
    <div class="container">
        <h2>📊 Xifres clau</h2>
        <div class="xifres-grid">
            <div class="xifra-card">
                <span class="xifra-num">55%</span>
                <p>de la població mundial viu en zones urbanes (4.000M de persones)</p>
            </div>
            <div class="xifra-card">
                <span class="xifra-num">70%</span>
                <p>serà la població urbana mundial l'any 2050</p>
            </div>
            <div class="xifra-card">
                <span class="xifra-num">1.100M</span>
                <p>de persones viuen en barris marginals o condicions similars</p>
            </div>
            <div class="xifra-card">
                <span class="xifra-num">9/10</span>
                <p>persones urbanes respiren aire que no compleix els estàndards OMS</p>
            </div>
            <div class="xifra-card">
                <span class="xifra-num">50%</span>
                <p>de la població urbana tenia accés al transport públic el 2022</p>
            </div>
            <div class="xifra-card">
                <span class="xifra-num">31%</span>
                <p>de l'energia mundial ja prové de fonts renovables (2023)</p>
            </div>
        </div>
    </div>
</section>

<!-- URBANITZACIÓ -->
<section class="seccio seccio-gris">
    <div class="container">
        <h2>🏙️ Evolució de la urbanització mundial</h2>
        <p>Percentatge de població que viu en zones urbanes (1950–2050)</p>
        <div class="grafic-wrapper">
            <canvas id="graficUrbanitzacio"></canvas>
        </div>
    </div>
</section>

<!-- BARRIS MARGINALS -->
<section class="seccio">
    <div class="container">
        <h2>🏚️ Població en barris marginals per regió (2022)</h2>
        <p>Milions de persones vivint en condicions precàries urbanes</p>
        <div class="grafic-wrapper">
            <canvas id="graficBarris"></canvas>
        </div>
    </div>
</section>

<!-- TRANSPORT -->
<section class="seccio seccio-gris">
    <div class="container">
        <h2>🚌 Accés al transport públic i espais verds</h2>
        <p>Percentatge de ciutats que compleixen els mínims recomanats per l'ONU</p>
        <div class="grafic-wrapper">
            <canvas id="graficTransport"></canvas>
        </div>
    </div>
</section>

<!-- ENERGIES RENOVABLES -->
<section class="seccio">
    <div class="container">
        <h2>⚡ Evolució de les energies renovables (2000–2023)</h2>
        <p>Percentatge d'energia mundial generada per fonts renovables</p>
        <div class="grafic-wrapper">
            <canvas id="graficEnergies"></canvas>
        </div>
    </div>
</section>

<!-- QUALITAT AIRE -->
<section class="seccio seccio-gris">
    <div class="container">
        <h2>💨 Qualitat de l'aire a les principals ciutats (2023)</h2>
        <p>Índex AQI mitjà anual — menor valor significa millor qualitat de l'aire</p>
        <div class="grafic-wrapper">
            <canvas id="graficAire"></canvas>
        </div>
    </div>
</section>

<!-- EMISSIONS CO2 -->
<section class="seccio">
    <div class="container">
        <h2>🏭 Emissions de CO₂ per zones urbanes (2023)</h2>
        <p>Les ciutats generen el 70% de les emissions globals. Distribució per sector</p>
        <div class="grafic-wrapper">
            <canvas id="graficCO2"></canvas>
        </div>
    </div>
</section>

<!-- METES ODS 11 -->
<section class="seccio seccio-gris">
    <div class="container">
        <h2>🎯 Metes de l'ODS 11 per al 2030</h2>
        <div class="metes-grid">
            <div class="meta-card">
                <span class="meta-icon">🏠</span>
                <h4>Habitatge digne</h4>
                <p>Garantir accés a habitatge segur i assequible per a tothom</p>
            </div>
            <div class="meta-card">
                <span class="meta-icon">🚇</span>
                <h4>Transport sostenible</h4>
                <p>Sistemes de transport accessibles, segurs i nets</p>
            </div>
            <div class="meta-card">
                <span class="meta-icon">🌳</span>
                <h4>Espais verds</h4>
                <p>Accés universal a espais públics segurs i inclusius</p>
            </div>
            <div class="meta-card">
                <span class="meta-icon">🛡️</span>
                <h4>Resiliència</h4>
                <p>Protecció davant desastres naturals i canvi climàtic</p>
            </div>
            <div class="meta-card">
                <span class="meta-icon">🏛️</span>
                <h4>Patrimoni cultural</h4>
                <p>Salvaguarda del patrimoni cultural i natural del món</p>
            </div>
            <div class="meta-card">
                <span class="meta-icon">♻️</span>
                <h4>Gestió de residus</h4>
                <p>Reducció de l'impacte ambiental de les ciutats</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="seccio cta">
    <div class="container text-center">
        <h2>Forma part del canvi</h2>
        <p>Explora els nostres productes sostenibles i contribueix a l'ODS 11</p>
        <a href="/view/productes.php" class="btn-hero">Veure productes</a>
    </div>
</section>

<script src="/js/grafics.js"></script>

<?php include("../includes/foot.html"); ?>