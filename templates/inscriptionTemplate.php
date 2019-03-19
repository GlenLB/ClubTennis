<?php
// Inclusion du head
include_once $rootDir . "/templates/partials/headPartial.php";?>

	<main id="inscriptionMain">
        <h1>Inscrivez-vous &#x2022; Rejoignez-nous</h1>
        <h3>Vous n'êtes plus qu'à quelques clics de jouer au tennis</h3>

        <!-- Formulaire inscription -->
        <div id="inscriptionBox">
            <form>
                <h3>Inscription</h3>
                <input type="text" placeholder="*prenom">
                <input type="text" placeholder="*nom">
                <input type="text" placeholder="*email">
                <input type="password" placeholder="*mot de passe">
                <input type="password" placeholder="*confirmation mot de passe">
                <a href="#" class="btn">S'INSCRIRE</a>
            </form>
        </div>
	</main>

	<?php
// Inclusion du footer
include_once $rootDir . "/templates/partials/footerPartial.php";?>
