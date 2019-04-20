<?php
/**
 * Script pour exécution des requêtes SQL de DSB via AJAX
 */
/* FIXME: $dataSQL vide */


// Définition du type MIME du fichier pour retour AJAX
header("Content-type: text/plain");

// RÉCUPÉRATION DE LA REQUETE SQL -----------------------

if(!isset($_POST["dataSQL"])) {
    echo "Données non définies";
    exit();
}
$dataSQL = $_POST["dataSQL"];

// INSERTION DES DONNEES DANS LA BDD -------------------------

// Informations de connexion
$user = "glen";
$pass = getenv("MYSQL_PASS");

try {
    // Ouverture de la connexion
    $bdd = new PDO("mysql:host=localhost;dbname=CLUBTENNIS", $user, $pass);
    // Récupération des données
    $req = $bdd->query($dataSQL);
    while($data = $req->fetch(PDO::FETCH_OBJ)) {
        foreach($data as $col) {
            echo($col . ";");
        }
        echo("\n");
    }
    if(!$req) {
        echo "Requête BDD non réussie";
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
} finally {
    // Fermeture de la connexion
    $req = null;
    $bdd = null;
}

