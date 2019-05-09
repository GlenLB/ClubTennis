<?php
// Inclusion du head
include_once $rootDir . "/templates/partials/headPartial.php";

// Redirection si l'utilisateur n'est pas connecté
if (!$_SESSION["prenom"]) {
    header("Location: http://" . $_SERVER["SERVER_NAME"]);
}
?>

	<main id="abonneMain">
        <h1>Votre espace abonné</h1>
        <h3>Vous pouvez modifier vos informations ci-dessous</h3>
        <form>
            <header>
                <h4>Vos informations</h4>
            </header>
            <div class="body">
                <label for="">Prénom</label>
                <input id="prenom" type="text" value="<?=$_SESSION['prenom']?>">
                <label for="">Nom</label>
                <input id="nom" type="text" value="<?=$_SESSION['nom']?>">
                <label for="">Pseudo</label>
                <input id="pseudo" type="text" value="<?=$_SESSION['pseudo']?>">
                <label for="">Adresse email</label>
                <input id="email" type="text" value="<?=$_SESSION['email']?>">
                <label for="">Description</label>
                <textarea id="description"><?=$_SESSION['description']?></textarea>
                <div id="btnChangementInfosAbonne" class="btn">ACTUALISER MES INFORMATIONS</div>
            </div>
        </form>
	</main>

<?php
// Inclusion du footer
include_once $rootDir . "/templates/partials/footerPartial.php";
?>