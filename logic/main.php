<?php
// TODO Revoir gestion des erreurs.
// TODO Envoi de mail à l'admin

/**
 * return le contenu de $file en gérant correctement les erreurs
 * s'il y en a.
 * Le paramètre $file est le path du fichier à inclure.
 * En cas d'erreur, une ligne est ajoutée au fichier de logs.
 * Retourne le contenu de $file ou un message d'erreur.
 */
function includeHandleError($file) {
    $res = "";
    try {
        $res = include_once $file;
        if(!$res) {
            throw new Exception("Template " . $file . " non trouvé.");
        }
    } catch(Exception $e) {
        // Création du message d'erreur
        $errorMsg = "Erreur serveur ---------- " . $e->getMessage() . "---------" . $e->getTraceAsString() . "\n";
        // Écriture du message d'erreur dans le fichier de logs
        file_put_contents("./file.txt", $errorMsg, FILE_APPEND);
        // Création du message affiché à l'utilisateur
        $res = "Votre page est inacessible. Merci de réessayer dans quelques heures.";
    }
    return $res;
}

