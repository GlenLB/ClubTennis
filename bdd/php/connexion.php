<?php
/**
 * Script pour connexion des utilisateurs
 */

// Définition du type MIME du fichier pour retour AJAX
header("Content-type: text/plain");

// RÉCUPÉRATION DES INFORMATIONS DE L'UTILISATEUR -----------------------

if (!isset($_POST["email"]) || !isset($_POST["mdp"])) {
    echo "Données non présentes";
    exit();
}
$email = htmlspecialchars($_POST["email"]);
$mdp = $_POST["mdp"];
if (!validationForm($email, $mdp)) {
    echo "Validation des données échouée";
    exit();
}

// RÉCUPÉRATION DES DONNEES DANS LA BDD -------------------------

// Informations de connexion
$user = "glen";
$pass = getenv("MYSQL_PASS");

try {
    // Ouverture de la connexion
    $bdd = new PDO("mysql:host=localhost;dbname=CLUBTENNIS", $user, $pass);
    // Récupération des données
    $req = $bdd->prepare("SELECT * FROM ABONNE WHERE EMAIL_ABONNE = ?");
    $req->execute(array($email));
    while ($data = $req->fetch()) {
        // Récupération des informations de l'utilisateur effectuée
        // Comparaison de l'email et du mot de passe fournis avec ceux stockés en BDD
        $emailBDD = $data["EMAIL_ABONNE"];
        $mdpBDD = $data["MDP_ABONNE"];
        /* Vérification des mots de passe pour la connexion avec password_verify() */
        if ($email == $emailBDD && password_verify($mdp, $mdpBDD)) {
            /* Utilisateur connecté avec succès */
            echo "success";
            /* Créer la session */
            creerSession($data);
            exit();
        } else {
            echo "Le mot de passe renseigné et le mot de passe stocké ne sont pas identiques.";
            exit();
        }
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    die();
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
function validationForm($email, $mdp) {
    // Vérification des longueurs de chaînes
    if (strlen($email) < 3) {
        return false;
    }
    if (strlen($mdp) < 5) {
        return false;
    }
    // Vérification que l'email contient un @ et un .
    if (strpos($email, "@") == false || strpos($email, ".") == false) {
        return false;
    }
    // Vérification que les chaînes ne contiennent pas d'élément <script></script>
    $arrayParams = [$email, $mdp];
    foreach ($arrayParams as $param) {
        if (strpos($param, "<script>") != false || strpos($param, "</script>") != false) {
            return false;
        }
    }
    return true;
}


/**
 * Créé la session en cas de connexion réussie de l'utilisateur
 * @param data les données de l'utilisateur provenant de la BDD
 */
function creerSession($data) {
    session_start();
    // Stocke les données utiles en session
    $_SESSION["prenom"] = $data["PRENOM_ABONNE"];
    $_SESSION["nom"] = $data["NOM_ABONNE"];
    $_SESSION["pseudo"] = $data["PSEUDO_ABONNE"];
    $_SESSION["email"] = $data["EMAIL_ABONNE"];
    $_SESSION["reduction"] = $data["REDUCTION_ABONNE"];
    $_SESSION["description"] = $data["DESCRIPTION_ABONNE"];
    $_SESSION["niveau"] = $data["NIVEAU_ABONNE"];
}