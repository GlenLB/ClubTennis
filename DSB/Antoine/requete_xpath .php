<?php
/* Chargement du fichier XML */
$xml = simplexml_load_file("clubTennis.xml");
/* Le prénom de l'abonné ayant l'ID n°24 */
$result = $xml->xpath("//abonne[@id_abonne='24']/@prenom");
/* Affiche le résultat */
print_r($result);
?>