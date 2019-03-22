<?php
/**
 * Script pour inscription des utilisateurs en BDD
 */

// Définition du type MIME du fichier pour retour AJAX
header("Content-type: text/plain");

// RÉCUPÉRATION DES INFORMATIONS DE L'UTILISATEUR -----------------------

$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$email = $_POST["email"];
$mdp = $_POST["mdp"]; // TODO: hash mdp

// INSERTION DES DONNEES DANS LA BDD -------------------------

// Informations de connexion
$user = "glen";
$pass = "****";
try {

    // Ouverture de la connexion
    $bdd = new PDO('mysql:host=localhost;dbname=CLUBTENNIS', $user, $pass);
    // Préparation de l'insertion
    $req = $dbh->prepare("INSERT INTO ABONNE(PRENOM, NOM, EMAIL, MDP) VALUES (?, ?, ?, ?)");
    $req->bindParam(1, $prenom);
    $req->bindParam(2, $nom);
    $req->bindParam(3, $email);
    $req->bindParam(4, $mdp);
    // Execution de l'insertion
    $req->execute();
    // TODO: rendre success selon résultat de req
    echo "success";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage() . "<br/>";
    die();
} finally {
    // Fermeture de la connexion
    $bdd = null;
}
