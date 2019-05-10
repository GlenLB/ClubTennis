<?php
// Redirige les visiteurs non connectés
session_start();
if(!$_SESSION["prenom"]) {
	header("Location: /");
}

// Inclusion du head
include_once $rootDir . "/templates/partials/headPartial.php";?>

	<main id="adminMain">
		<h1>Ajouter une image à la galerie</h1>
		<ol>
			<li>Ajoutez une image depuis votre ordinateur en cliquant sur le bouton "Choisir un fichier".</li>
			<li>Cliquez sur le bouton "DÉPOSER" pour ajouter cette image à la galerie d'images.</li>
		</ol>
		<form action="apiUpload" method="post" enctype="multipart/form-data">
			<input type="file" name="images" id="fileUpload">
			<input type="submit" name="submit" value="DÉPOSER" class="btn">
			<div>
				<i><b>Note</b> : Seuls les formats <code>.jpg</code>, <code>.jpeg</code> et <code>.png</code> sont autorisés.</i>
			</div>
		</form>
	</main>

<?php
// Inclusion du footer
include_once $rootDir . "/templates/partials/footerPartial.php";?>