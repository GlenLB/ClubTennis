<?php
/* Récupère les informations de session si une session a été créé */
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$page->title?></title>
    <meta name="description" content="<?=$page->description?>">
    <link rel="canonical" href="<?=$page->canonical?>">
    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="<?=$fullHost . '/statics/css/style.css'?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Monoton|Open+Sans" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <!-- Header -->
    <header>
        <!-- Menu hamburger mobile -->
        <span id="menuHamburger" class="menuHamburger">
            <span></span>
            <span></span>
            <span></span>
        </span>
        <!-- Liens nav mobile -->
        <div id="liensNavMobile" class="liensNavMobileHidden">
            <a href="/inscription">INSCRIPTION</a><br>
            <a href="/club">LE CLUB</a><br>
            <a href="/contact">CONTACT</a><br>
            <a href="/galerie">GALERIE</a><br>
            <?php if ($_SESSION["prenom"]) { echo("<a href='/admin'>ADMIN</a><br>"); } ?>
            <?php
                // Si l'utilisateur n'est pas connecté, affiche le bouton de connexion
                if (!$_SESSION["prenom"]) {
                    echo ('<a id="btnConnexionNavbarMobile" class="btn btnConnexionNavbar">SE CONNECTER</a>');
                } else {
                    // Si l'utilisateur est connecté, affiche l'icone d'espace abonné
                    echo ('<i id="userIconMobile" class="far fa-user userIcon"></i>');
                }
            ?>
        </div>
        <!-- Navigation -->
        <nav>
            <!-- Logo -->
            <div id="logoContainer">
                <a href="/"><img id="logo" src="<?=$fullHost . '/statics/img/logo.png'?>" alt="Logo"></a>
                <a href="/"><h2 id="logoTitle">EarthLoader</h2></a>
            </div>
            <!-- Liens -->
            <div id="liensNav">
                <a href="/inscription">INSCRIPTION</a>
                <a href="/club">LE CLUB</a>
                <a href="/contact">CONTACT</a>
                <a href="/galerie">GALERIE</a>
                <?php if ($_SESSION["prenom"]) { echo("<a href='/admin'>ADMIN</a><br>"); } ?>
            </div>
        </nav>
        <!-- Icone connexion espace abonné -->
        <?php
            // Si l'utilisateur n'est pas connecté, affiche le bouton de connexion
            if (!$_SESSION["prenom"]) {
                echo ('<a id="btnConnexionNavbar" class="btn btnConnexionNavbar" href="#1">SE CONNECTER</a>');
            } else {
                // Si l'utilisateur est connecté, affiche l'icone d'espace abonné
                echo ('<i id="userIcon" class="far fa-user userIcon"></i>');
            }
        ?>
    </header>
    <!-- Modal connexion -->
    <div id="modalConnect">
        <form>
            <i id="modalClose" class="fas fa-times"></i>
            <h3>Connexion</h3>
            <input type="text" placeholder="email">
            <input type="password" placeholder="mot de passe">
            <a href="#1" class="btn">SE CONNECTER</a>
            <a id="mdpOublie" href="#1">Mot de passe oublié ?</a>
        </form>
    </div>
    <!-- Modal espace abonné -->
    <div id="modaleEspaceAbonne">
        <i id="infoConnexion"><i class="fas fa-check-square"></i> Connecté</i>
        <i><?= $_SESSION["prenom"] . " " . $_SESSION["nom"] ?></i>
        <i><?= $_SESSION["pseudo"] ?></i>
        <i><?= $_SESSION["email"] ?></i>
        <i>"<?= $_SESSION['description'] ?>"</i>
        <i>Niveau tennis : <?= $_SESSION["niveau"] ?></i>
        <a class="info" href="compte-abonne">Changer mes informations</a>
        <a id="deconnexion" href="#1" class="btn">DÉCONNEXION</a>
        <a class="red" href="#1">Supprimer mon compte</a>
    </div>
