<?php
$usuari = null;
include("includes/head.html");
include("includes/menu.php");
?>

<!-- HERO -->
<section class="hero">
    <div class="hero-text">
        <h1>Comunitats Sostenibles</h1>
        <p>Construïm junts un futur més verd, just i habitable per a tothom</p>
        <a href="view/products.php" class="btn-hero">Descobreix els productes</a>
    </div>
</section>

<!-- QUÈ ÉS -->
<section class="seccio">
    <div class="container">
        <h2>Què és una Comunitat Sostenible?</h2>
        <p>
            Una comunitat sostenible és aquella que cobreix les necessitats dels seus habitants 
            sense comprometre les generacions futures. Es basa en tres pilars fonamentals: 
            el <strong>benestar social</strong>, la <strong>responsabilitat mediambiental</strong> 
            i el <strong>desenvolupament econòmic equilibrat</strong>.
        </p>
    </div>
</section>

<!-- PILARS -->
<section class="seccio seccio-gris">
    <div class="container">
        <h2> Els tres pilars</h2>
        <div class="pilars-grid">
            <div class="pilar">
                <span class="pilar-icon">♻️</span>
                <h3>Medi Ambient</h3>
                <p>Reducció d'emissions, energies renovables i gestió responsable dels recursos naturals.</p>
            </div>
            <div class="pilar">
                <span class="pilar-icon">🤝</span>
                <h3>Cohesió Social</h3>
                <p>Igualtat d'oportunitats, accessibilitat i participació ciutadana activa.</p>
            </div>
            <div class="pilar">
                <span class="pilar-icon">📈</span>
                <h3>Economia Local</h3>
                <p>Foment del comerç de proximitat, productes ecològics i economies circulars.</p>
            </div>
        </div>
    </div>
</section>

<!-- ODS 11 -->
<section class="seccio">
    <div class="container">
        <h2>ODS 11 · Ciutats i Comunitats Sostenibles</h2>
        <p>
            L'Objectiu de Desenvolupament Sostenible número 11 de l'ONU proposa aconseguir que 
            les ciutats i els assentaments humans siguin <strong>inclusius, segurs, resilients i sostenibles</strong> 
            per a l'any 2030.
        </p>
        <ul class="llista-ods">
            <li>✅ Accés a habitatge digne i assequible</li>
            <li>✅ Sistemes de transport sostenibles</li>
            <li>✅ Planificació urbana inclusiva</li>
            <li>✅ Protecció del patrimoni cultural i natural</li>
            <li>✅ Reducció de l'impacte ambiental de les ciutats</li>
        </ul>
    </div>
</section>

<!-- CTA -->
<section class="seccio cta">
    <div class="container text-center">
        <h2>Explora els nostres productes sostenibles</h2>
        <p>Tots els productes d'aquesta plataforma estan relacionats amb la sostenibilitat urbana i el benestar col·lectiu.</p>
        <a href="/view/products.php" class="btn-hero">Veure productes</a>
    </div>
</section>

<?php include("includes/foot.html"); ?>