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
    case "/club":
        $page = new Page(
            "Club de tennis EarthLoader",
            "Club de tennis EarthLoader",
            $fullHost . $requestURI
        );
        // Inclusion du template
        include_once $rootDir . "/templates/clubTemplate.php";
        break;
    case "/contact":
        $page = new Page(
            "Club de tennis EarthLoader contact",
            "Club de tennis EarthLoader contact",
            $fullHost . $requestURI
        );
        // Inclusion du template
        include_once $rootDir . "/templates/contactTemplate.php";
        break;
    case "/compte-abonne":
        $page = new Page(
            "Espace abonné du club de tennis EarthLoader",
            "Espace abonné du club de tennis EarthLoader",
            $fullHost . $requestURI
        );
        // Inclusion du template
        include_once $rootDir . "/templates/abonneTemplate.php";
        break;
    case "/galerie":
        $page = new Page(
            "Galerie d'images du club de tennis Earthloader",
            "Galerie d'images du club de tennis Earthloader",
            $fullHost . $requestURI
        );
        // Inclusion du template
        include_once $rootDir . "/templates/galerie.php";
        break;
    case "/admin":
        $page = new Page(
            "Espace admin",
            "Espace admin",
            $fullHost . $requestURI
        );
        // Inclusion du template
        include_once $rootDir . "/templates/admin.php";
        break;

    // API -------------------------------------------------------
    case "/apiInscription":
        include_once $rootDir . "/bdd/php/inscription.php";
        break;
    case "/apiConnexion":
        include_once $rootDir . "/bdd/php/connexion.php";
        break;
    case "/apiDeconnexion":
        include_once $rootDir . "/bdd/php/deconnexion.php";
        break;
    case "/apiChangementInfosAbonne":
        include_once $rootDir . "/bdd/php/changementInfosAbonne.php";
        break;
    case "/apiEnvoiMail":
        include_once $rootDir . "/bdd/php/envoiMail.php";
        break;
    case "/apiUpload":
        include_once $rootDir . "/bdd/php/upload.php";
        break;
    case "/dsb":
        include_once $rootDir . "/DSB/page_web/dsbTemplate.php";
        break;
    case "/bddToXML":
        include_once $rootDir . "/DSB/Antoine/xml.php";
        break;
    case "/executionRequetesDSB":
        include_once $rootDir . "/DSB/page_web/execution_requetes.php";
        break;
    // Gestion des erreurs 404
    default:
        echo "Erreur 404 -> page non trouvée.";
        break;
}
