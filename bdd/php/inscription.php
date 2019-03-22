<?php
/**
 * Script pour inscription des utilisateurs en BDD
 * TODO: Si l'adresse email est déjà présente dans la BDD, l'inscription ne peut se faire
 */

// Définition du type MIME du fichier pour retour AJAX
header("Content-type: text/plain");

// RÉCUPÉRATION DES INFORMATIONS DE L'UTILISATEUR -----------------------

$prenom = htmlspecialchars($_POST["prenom"]);
$nom = htmlspecialchars($_POST["nom"]);
$email = htmlspecialchars($_POST["email"]);
/* Hashage du mot de passe. Faire les vérifications pour la connexion avec password_verify() */
$mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

// INSERTION DES DONNEES DANS LA BDD -------------------------

// Informations de connexion
$user = "glen";
$pass = getenv("MYSQL_PASS");

try {
    // Ouverture de la connexion
    $bdd = new PDO("mysql:host=localhost;dbname=CLUBTENNIS", $user, $pass);
    // Préparation de l'insertion
    $req = $bdd->prepare("INSERT INTO ABONNE(PRENOM_ABONNE, NOM_ABONNE, EMAIL_ABONNE, MDP_ABONNE) VALUES (?, ?, ?, ?)");
    $req->bindParam(1, $prenom);
    $req->bindParam(2, $nom);
    $req->bindParam(3, $email);
    $req->bindParam(4, $mdp);
    // Execution de l'insertion
    $req->execute();
    if($req) {
        echo "success";
    } else {
        echo "Insertion non réussie";
        // TODO: gestion erreur => envoi d'un mail à l'admin pour le prévenir
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    // TODO: gestion erreur => envoi d'un mail à l'admin pour le prévenir
    //die();
} finally {
    // Fermeture de la connexion
    $req = null;
    $bdd = null;
}
