<?php
$usuari = null;
include("../includes/head.html");
include("../includes/menu.php");
?>

<section class="hero hero-petit">
    <div class="hero-text">
        <h1>Accés a la plataforma</h1>
        <p>Inicia sessió per gestionar productes, categories i usuaris</p>
    </div>
</section>

<div class="login-wrapper">
    <div class="form-login">
        <h2>Iniciar Sessió</h2>
        <p class="login-sub">Accedeix amb el teu compte EcoCity</p>

        <?php if (isset($_GET['error'])): ?>
            <div class="missatge-error">
                <?php
                    $errors = [
                        'buits'       => 'Si us plau, omple tots els camps.',
                        'incorrectes' => 'Usuari o contrasenya incorrectes.',
                        'connexio'    => 'Error de connexió. Torna-ho a intentar.',
                    ];
                    echo $errors[$_GET['error']] ?? 'Error desconegut.';
                ?>
            </div>
        <?php endif; ?>

        <form action="/controller/login.php" method="POST">
            <div class="camp">
                <label for="usuari">Usuari</label>
                <input type="text" id="usuari" name="usuari" 
                       placeholder="El teu nom d'usuari" 
                       autocomplete="username" required>
            </div>

            <div class="camp">
                <label for="contrasenya">Contrasenya</label>
                <input type="password" id="contrasenya" name="contrasenya" 
                       placeholder="La teva contrasenya" 
                       autocomplete="current-password" required>
            </div>

            <button type="submit" class="btn-login-submit">Iniciar Sessió</button>
        </form>

        <p class="login-footer">
            Encara no tens compte?
            <a href="/view/registre.php">Registra't</a>
        </p>
    </div>
</div>

<?php include("../includes/foot.html"); ?>