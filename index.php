<?php
/**
 * Routeur
 */

// Récupération de l'URI
$requestURI = $_SERVER["REQUEST_URI"];
// Récupération de l'adresse host
$fullHost = "http://" . $_SERVER['HTTP_HOST'];
// Définition du répertoire root du site web
$rootDir = getenv("TENNISROOTDIR");

/**
 *  Définition de la structure d'une page Html
 */
class Page
{
    public $title;
    public $description;
    public $canonical;
    public function __construct($title, $description, $canonical)
    {
        $this->title = $title;
        $this->description = $description;
        $this->canonical = $canonical;
    }
}

// Routage
switch ($requestURI) {
    case "/":
        // Définition des informations de la page
        // Variables passées au template
        $page = new Page(
            "Club de tennis",
            "Site web du club de tennis",
            $fullHost . $requestURI
        );
        // Inclusion du template
        include_once $rootDir . "/templates/indexTemplate.php";
        break;
    case "/inscription":
        $page = new Page(
            "Inscription au club de tennis",
            "Inscrivez-vous pour pouvoir jouer dans notre club de tennis",
            $fullHost . $requestURI
        );
        // Inclusion du template
        include_once $rootDir . "/templates/inscriptionTemplate.php";
        break;
    // Gestion des erreurs 404
    default:
        echo "Erreur 404 -> page non trouvée.";
        break;
}
