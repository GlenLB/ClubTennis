<?php

// Définition du type MIME du fichier pour retour AJAX
header("Content-type: text/plain");


// RÉCUPÉRATION DES INFORMATIONS DE L'UTILISATEUR -----------------------

if(!isset($_POST["prenom"]) || !isset($_POST["nom"]) || !isset($_POST["pseudo"]) || !isset($_POST["email"]) || !isset($_POST["description"]) || !isset($_POST["emailSession"])) {
    exit();
}

$prenom = htmlspecialchars($_POST["prenom"]);
$nom = htmlspecialchars($_POST["nom"]);
$pseudo = htmlspecialchars($_POST["pseudo"]);
$email = htmlspecialchars($_POST["email"]);
$emailSession = htmlspecialchars($_POST["emailSession"]);
$description = htmlspecialchars($_POST["description"]);


// RECUPERATION DES DONNEES DANS LA BDD -------------------------

// Informations de connexion
$user = "glen";
$pass = getenv("MYSQL_PASS");

try {
    // Ouverture de la connexion
    $bdd = new PDO("mysql:host=localhost;dbname=CLUBTENNIS", $user, $pass);
    // Si l'email a changé, vérifie que la nouvelle adresse email n'est pas déjà stockée en BDD
    if($email != $emailSession) {
        $req = $bdd->prepare("SELECT * FROM ABONNE WHERE EMAIL_ABONNE = ?");
        $req->execute(array($email));
        if($req->rowCount > 0) {
            // L'email est déjà présente dans la BDD
            echo("Nouvelle adresse email déjà prise.");
            exit();
        }
    }
    // Push les changements en BDD
    $req = $bdd->prepare("UPDATE ABONNE SET PRENOM_ABONNE = ?, NOM_ABONNE = ?, PSEUDO_ABONNE = ?, EMAIL_ABONNE = ?, DESCRIPTION_ABONNE = ? WHERE EMAIL_ABONNE = ?");
    $req->execute(array($prenom, $nom, $pseudo, $email, $description, $emailSession));
    // Stocke les nouvelles données en session
    actualiseSession();
    echo("Vos données ont bien été actualisées.");
    exit();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
} finally {
    // Fermeture de la connexion
    $req = null;
    $bdd = null;
}


/**
 * Actualise la session avec les nouvelles informations de l'abonné
 */
function actualiseSession() {
    // Stocke les données utiles en session
    session_start();
    $_SESSION["prenom"] = $prenom;
    $_SESSION["nom"] = $nom;
    $_SESSION["pseudo"] = $pseudo;
    $_SESSION["email"] = $email;
    $_SESSION["description"] = $description;
}