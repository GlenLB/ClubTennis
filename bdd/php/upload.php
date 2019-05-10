<?php
// Définition du répertoire root du site web
$rootDir = getenv("TENNISROOTDIR");

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le fichier a été uploadé sans erreur.
    if (isset($_FILES["images"]) && $_FILES["images"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $filename = $_FILES["images"]["name"];
        $filetype = $_FILES["images"]["type"];
        $boolean = false;
        $filesize = $_FILES["images"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            die("Erreur : Veuillez sélectionner un format de fichier valide.");
        }

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Error: La taille du fichier est supérieure à la limite autorisée qui est de 5Mo.");
        }

        // Vérifie le type MIME du fichier
        if (in_array($filetype, $allowed)) {
            // Vérifie si le fichier existe avant de le télécharger.
            if (file_exists($rootDir . "/statics/img/galerie/" . $_FILES["images"]["name"])) {
                echo $_FILES["images"]["name"] . " existe déjà.";
            } else {
                move_uploaded_file($_FILES["images"]["tmp_name"], $rootDir . "/statics/img/galerie/" . $_FILES["images"]["name"]);
                $boolean = true;
                //Connexion à la bdd
                if ($boolean == true) {
                    try {
                        // Informations de connexion
                        $user = "glen";
                        $pass = getenv("MYSQL_PASS");
                        // Connexion
                        $bdd = new PDO("mysql:host=localhost;dbname=CLUBTENNIS", $user, $pass);
                        // Ajoute le nom de l'image dans la table GALERIE
                        $req = $bdd->prepare('INSERT INTO GALERIE(CONTENT) VALUES (?)');
                        $req->execute(array($filename));
                        if ($req) {
                            echo "Votre fichier a été téléchargé avec succès.";
                        } else {
                            echo "Une erreur a eu lieu. Merci de réésayer dans quelques minutes.";
                        }
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    } finally {
                        // Fermeture de la connexion
                        $req = null;
                        $bdd = null;
                    }
                }
            }
        } else {
            echo "Erreur: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer. ";
        }
    } else {
        echo "Erreur: " . $_FILES["images"]["error"];
    }
}

// Redirige l'utilisateur vers la galerie d'images
header("Location: /galerie");
