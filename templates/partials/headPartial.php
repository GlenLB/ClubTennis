<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page->title ?></title>
    <meta name="description" content="<?= $page->description ?>">
    <link rel="canonical" href="<?= $page->canonical ?>">
    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="<?= $fullHost . '/statics/css/style.css' ?>">
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
            <a href="">LE CLUB</a><br>
            <a href="">CONTACT</a><br>
            <a href="/dsb">DSB</a><br>
            <i id="userIconMobile" class="far fa-user userIcon"></i>
        </div>
        <!-- Navigation -->
        <nav>
            <!-- Logo -->
            <div id="logoContainer">
                <a href="/"><img id="logo" src="<?= $fullHost . '/statics/img/logo.png' ?>" alt="Logo"></a>
                <a href="/"><h2 id="logoTitle">EarthLoader</h2></a>
            </div>
            <!-- Liens -->
            <div id="liensNav">
                <a href="/inscription">INSCRIPTION</a>
                <a href="#">LE CLUB</a>
                <a href="#">CONTACT</a>
                <a href="/dsb">DSB</a><br>
            </div>
        </nav>
        <!-- Icone user pour ecrans larges -->
        <i id="userIcon" class="far fa-user userIcon"></i>
    </header>
    <!-- Modal connexion -->
    <div id="modalConnect">
        <form>
            <i id="modalClose" class="fas fa-times"></i>
            <h3>Connexion</h3>
            <input type="text" placeholder="email">
            <input type="password" placeholder="mot de passe">
            <a href="#1" class="btn">SE CONNECTER</a>
        </form>
    </div>
    