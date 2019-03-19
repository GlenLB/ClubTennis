<?php
// Inclusion du head
include_once $rootDir . "/templates/partials/headPartial.php";?>

	<main>
        <h1 id="h1Accueil">Inscrivez-vous &#x2022; Rejoignez-nous</h1>

        <!-- Formulaire inscription -->
        <div id="inscriptionBox">
            <form>
                <h3>Inscription</h3>
                <input type="text" placeholder="prenom">
                <input type="text" placeholder="nom">
                <input type="text" placeholder="email">
                <input type="password" placeholder="mot de passe">
                <a href="#" class="btn">S'INSCRIRE</a>
            </form>
        </div>
	</main>

	<?php
// Inclusion du footer
include_once $rootDir . "/templates/partials/footerPartial.php";?>
