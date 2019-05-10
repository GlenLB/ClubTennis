<?php
/**
 * Script pour inscription des utilisateurs en BDD
 * TODO: Si l'adresse email est déjà présente dans la BDD, l'inscription ne peut se faire
 */

// Définition du type MIME du fichier pour retour AJAX
header("Content-type: text/plain");

// RÉCUPÉRATION DES INFORMATIONS DE L'UTILISATEUR -----------------------

if(!isset($_POST["prenom"]) || !isset($_POST["nom"]) || !isset($_POST["email"]) || !isset($_POST["mdp"])) {
    exit();
}
$prenom = htmlspecialchars($_POST["prenom"]);
$nom = htmlspecialchars($_POST["nom"]);
$email = htmlspecialchars($_POST["email"]);
/* Hashage du mot de passe. Faire les vérifications pour la connexion avec password_verify() */
$mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
if(!validationForm($prenom, $nom, $email, $mdp)) {
    exit("Validation des données échouée");
}

// INSERTION DES DONNEES DANS LA BDD -------------------------

// Informations de connexion
$user = getenv("MYSQL_USER");
$pass = getenv("MYSQL_PASS");
$bddName = getenv("BDD_NAME");

try {
    // Ouverture de la connexion
    $bdd = new PDO("mysql:host=localhost;dbname=" . $bddName, $user, $pass);
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
        exit();
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
} finally {
    // Fermeture de la connexion
    $req = null;
    $bdd = null;
}

/**
 * Vérifie que les données saisies par l'utilisateur sont correctes.
 * Vérifications effectuées :
 * Longueur des paramètres
 * Param email contient un "@" et un "."
 * Les chaînes de caractères ne contiennent pas d'élément <script></script>
 * TODO: vérifier l'adresse mail avec une expression régulière
 */
function validationForm($prenom, $nom, $email, $mdp) {
    // Vérification des longueurs de chaînes
    if (strlen($prenom) < 3) return false;
    if (strlen($nom) < 3) return false;
    if (strlen($email) < 3) return false;
    if (strlen($mdp) < 5) return false;
    // Vérification que l'email contient un @ et un .
    if (strpos($email, "@") == false || strpos($email, ".") == false) {
        return false;
    }
    // Vérification que les chaînes ne contiennent pas d'élément <script></script>
    $arrayParams = [$prenom, $nom, $email, $mdp];
    foreach($arrayParams as $param) {
        if (strpos($param, "<script>") != false || strpos($param, "</script>") != false) {
            return false;
        }
    }
    return true;
}
