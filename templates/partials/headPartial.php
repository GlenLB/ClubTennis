<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page->title ?></title>
    <meta name="description" content="<?php echo $page->description ?>">
    <link rel="canonical" href="<?php echo $page->canonical ?>">
    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="./statics/css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Monoton|Open+Sans" rel="stylesheet">
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
            <a href="">INSCRIPTION AU CLUB</a><br>
            <a href="">LE CLUB</a><br>
            <a href="">CONTACT</a>
        </div>
        <!-- Navigation -->
        <nav>
            <!-- Logo -->
            <div id="logoContainer">
                <img id="logo" src="./statics/img/logo.png" alt="Logo">
                <h2 id="logoTitle">EarthLoader</h2>
            </div>
            <!-- Liens -->
            <div id="liensNav">
                <a href="">INSCRIPTION AU CLUB</a>
                <a href="">LE CLUB</a>
                <a href="">CONTACT</a>
            </div>
        </nav>
    </header>
