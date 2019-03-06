<?php
// Router

// Récupération de l'URI
$requestURI = $_SERVER["REQUEST_URI"];

// Définition de la structure d'une page Html
class Page {
    public $title;
    public $description;
    public $canonical;
    public $h1;
    public function __construct($title, $description, $canonical, $h1) {
        $this->title = $title;
        $this->description = $description;
        $this->canonical = $canonical;
        $this->h1 = $h1;
    }
}

// Routage
switch ($requestURI) {
    case "/":
        $page = new Page(
            "Club de tennis",
            "Site web du club de tennis",
            "http://" . $_SERVER["HTTP_HOST"] . $requestURI,
            "Earthloader, le club de tennis fait pour tous et toutes.");
        require_once "templates/indexTemplate.php";
        break;
    default:
        echo $requestURI . "<br>";
        echo ("Erreur 404 -> page non trouvée.");
        break;
}
