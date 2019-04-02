<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Pour écrire l'output dans le navigateur
//header("Content-Type: text/plain/");
// Pour écrire l'output dans un fichier
header("Content-Type: text/html/force-download");
header("Content-Disposition: attachment; filename=xmlResult.xml");

$user = "glen";
$pass = getenv("MYSQL_PASS");

// BASE DE DONNÉES ---------------------------------------------------

try {
    $bdd = new PDO("mysql:host=localhost; dbname=CLUBTENNIS; charset=utf8", $user, $pass);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    die("Erreur : " . $e->getMessage());
}

// Récuperation des données
$reponse_club = $bdd->query('SELECT * FROM CLUB');
$reponse_terrain = $bdd->query('SELECT * FROM TERRAIN');
$reponse_entraineur = $bdd->query('SELECT * FROM ENTRAINEUR');
$reponse_entrainement = $bdd->query('SELECT * FROM ENTRAINEMENT');
$reponse_abonne = $bdd->query('SELECT * FROM ABONNE');
$reponse_match = $bdd->query('SELECT * FROM MATCH_TENNIS');
$reponse_avatar = $bdd->query('SELECT * FROM AVATAR');
$reponse_image = $bdd->query('SELECT * FROM IMAGE_PW');
$reponse_abonne_perd_match = $bdd->query('SELECT * FROM ABONNE_PERD_MATCH');
$reponse_abonne_gagne_match = $bdd->query('SELECT * FROM ABONNE_GAGNE_MATCH');
$reponse_entrainement_a_lieu_sur_terrain = $bdd->query('SELECT * FROM ENTRAINEMENT_A_LIEU_SUR_TERRAIN');
$reponse_entrainement_a_entraineur = $bdd->query('SELECT * FROM ENTRAINEMENT_A_ENTRAINEUR');
$reponse_entraineur_travaille_pour_club = $bdd->query('SELECT * FROM     ENTRAINEUR_TRAVAILLE_POUR_CLUB');

// XML ---------------------------------------------------

$xml = new XMLWriter();
$xml->openUri("php://output");
$xml->setIndent(true);
$xml->setIndentString("    ");
$xml->startDocument('1.0', 'utf-8');
$xml->startDtd('mon_club SYSTEM "dtd_clubTennis.dtd"');
$xml->endDtd();
$xml->startElement('mon_club');

while ($donnees = $reponse_club->fetch()) {
    $xml->startElement('club');
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->writeAttribute('nom', $donnees['NOM_CLUB']);
    $xml->writeAttribute('horaires', $donnees['HORAIRES_CLUB']);
    $xml->writeAttribute('tel', $donnees['TEL_CLUB']);
    $xml->writeAttribute('email', $donnees['EMAIL_CLUB']);
    $xml->writeAttribute('adresse', $donnees['ADRESSE_CLUB']);
    $xml->endElement();
}
while ($donnees = $reponse_terrain->fetch()) {
    $xml->startElement('terrain');
    $xml->writeAttribute('id_terrain', $donnees['ID_TERRAIN']);
    $xml->writeAttribute('couvert', $donnees['COUVERT_TERRAIN']);
    $xml->writeAttribute('type', $donnees['TYPE_TERRAIN']);
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->endElement();
}
while ($donnees = $reponse_entraineur->fetch()) {
    $xml->startElement('entraineur');
    $xml->writeAttribute('id_entraineur', $donnees['ID_ENTRAINEUR']);
    $xml->writeAttribute('prenom', $donnees['PRENOM_ENTRAINEUR']);
    $xml->writeAttribute('nom', $donnees['NOM_ENTRAINEUR']);
    $xml->writeAttribute('description', $donnees['DESCRIPTION_ENTRAINEUR']);
    $xml->endElement();
}
while ($donnees = $reponse_entrainement->fetch()) {
    $xml->startElement('entrainement');
    $xml->writeAttribute('id_entrainement', $donnees['ID_ENTRAINEMENT']);
    $xml->writeAttribute('heure_debut', $donnees['HEURE_DEBUT_ENTRAINEMENT']);
    $xml->writeAttribute('heure_fin', $donnees['HEURE_FIN_ENTRAINEMENT']);
    $xml->writeAttribute('niveau', $donnees['NIVEAU_ENTRAINEMENT']);
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->endElement();
}
while ($donnees = $reponse_abonne->fetch()) {
    $xml->startElement('abonne');
    $xml->writeAttribute('id_abonne', $donnees['ID_ABONNE']);
    $xml->writeAttribute('prenom', $donnees['PRENOM_ABONNE']);
    $xml->writeAttribute('nom', $donnees['NOM_ABONNE']);
    $xml->writeAttribute('pseudo', $donnees['PSEUDO_ABONNE']);
    $xml->writeAttribute('email', $donnees['EMAIL_ABONNE']);
    $xml->writeAttribute('reduction', $donnees['REDUCTION_ABONNE']);
    $xml->writeAttribute('description', $donnees['DESCRIPTION_ABONNE']);
    $xml->writeAttribute('niveau', $donnees['NIVEAU_ABONNE']);
    $xml->writeAttribute('mdp', $donnees['MDP_ABONNE']);
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->writeAttribute('id_entrainement', $donnees['ID_ENTRAINEMENT']);
    $xml->endElement();
}
while ($donnees = $reponse_match->fetch()) {
    $xml->startElement('match_tennis');
    $xml->writeAttribute('id_match', $donnees['ID_MATCH']);
    $xml->writeAttribute('heure_debut', $donnees['HEURE_DEBUT_MATCH']);
    $xml->writeAttribute('heure_fin', $donnees['HEURE_FIN_MATCH']);
    $xml->writeAttribute('competition', $donnees['COMPETITION_MATCH']);
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->writeAttribute('id_terrain', $donnees['ID_TERRAIN']);
    $xml->endElement();
}
while ($donnees = $reponse_avatar->fetch()) {
    $xml->startElement('avatar');
    $xml->writeAttribute('id_avatar', $donnees['ID_AVATAR']);
    $xml->writeAttribute('filename', $donnees['FILENAME_AVATAR']);
    $xml->writeAttribute('id_abonne', $donnees['ID_ABONNE']);
    $xml->endElement();
}
while ($donnees = $reponse_image->fetch()) {
    $xml->startElement('image_pw');
    $xml->writeAttribute('id_image', $donnees['ID_IMAGE']);
    $xml->writeAttribute('filename', $donnees['FILENAME_IMAGE']);
    $xml->endElement();
}
while ($donnees = $reponse_abonne_perd_match->fetch()) {
    $xml->startElement('abonne_perd_match');
    $xml->writeAttribute('id_abonne', $donnees['ID_ABONNE']);
    $xml->writeAttribute('id_match', $donnees['ID_MATCH']);
    $xml->endElement();
}
while ($donnees = $reponse_abonne_gagne_match->fetch()) {
    $xml->startElement('abonne_gagne_match');
    $xml->writeAttribute('id_abonne', $donnees['ID_ABONNE']);
    $xml->writeAttribute('id_match', $donnees['ID_MATCH']);
    $xml->endElement();
}
while ($donnees = $reponse_entrainement_a_lieu_sur_terrain->fetch()) {
    $xml->startElement('entrainement_a_lieu_sur_terrain');
    $xml->writeAttribute('id_terrain', $donnees['ID_TERRAIN']);
    $xml->writeAttribute('id_entrainement', $donnees['ID_ENTRAINEMENT']);
    $xml->endElement();
}
while ($donnees = $reponse_entrainement_a_entraineur->fetch()) {
    $xml->startElement('entrainement_a_entraineur');
    $xml->writeAttribute('id_entrainement', $donnees['ID_ENTRAINEMENT']);
    $xml->writeAttribute('id_entraineur', $donnees['ID_ENTRAINEUR']);
    $xml->endElement();
}
while ($donnees = $reponse_entraineur_travaille_pour_club->fetch()) {
    $xml->startElement('entraineur_travaille_pour_club');
    $xml->writeAttribute('id_entraineur', $donnees['ID_ENTRAINEUR']);
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->endElement();
}

$xml->endElement();
$xml->flush();
