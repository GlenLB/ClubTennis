<?php
//Connexion à la base de données
try {
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_tennis;charset=utf8', 'root', '');
}
catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}

//Recuperation des données
$reponse_club = $bdd->query('SELECT * FROM club');
$reponse_terrain = $bdd->query('SELECT * FROM terrain');
$reponse_entraineur = $bdd->query('SELECT * FROM entraineur');
$reponse_entrainement = $bdd->query('SELECT * FROM entrainement');
$reponse_abonne = $bdd->query('SELECT * FROM abonne');
$reponse_match = $bdd->query('SELECT * FROM match_tennis');
$reponse_avatar = $bdd->query('SELECT * FROM avatar');
$reponse_image = $bdd->query('SELECT * FROM image_pw');
$reponse_abonne_perd_match = $bdd->query('SELECT * FROM abonne_perd_match');
$reponse_abonne_gagne_match = $bdd->query('SELECT * FROM abonne_gagne_match');
$reponse_entrainement_a_lieu_sur_terrain = $bdd->query('SELECT * FROM entrainement_a_lieu_sur_terrain');
$reponse_entrainement_a_entraineur = $bdd->query('SELECT * FROM entrainement_a_entraineur');
$reponse_entraineur_travaille_pour_club = $bdd->query('SELECT * FROM     entraineur_travaille_pour_club');



$xml= new XMLWriter();
$xml->openUri("clubTennis.xml");
$xml->startDocument('1.0', 'utf-8');
$xml->startElement('mon_club');

  while($donnees=$reponse_club->fetch()){
    $xml->startElement('club');
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->writeAttribute('nom', $donnees['NOM_CLUB']);
    $xml->writeAttribute('horaires', $donnees['HORAIRES_CLUB']);
    $xml->writeAttribute('tel', $donnees['TEL_CLUB']);
    $xml->writeAttribute('email', $donnees['EMAIL_CLUB']);
    $xml->writeAttribute('adresse', $donnees['ADRESSE_CLUB']);
    $xml->endElement();
  }
  while($donnees=$reponse_terrain->fetch()){
    $xml->startElement('terrain');
    $xml->writeAttribute('id_terrain', $donnees['ID_TERRAIN']);
    $xml->writeAttribute('couvert', $donnees['COUVERT_TERRAIN']);
    $xml->writeAttribute('type', $donnees['TYPE_TERRAIN']);
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->endElement();
  }
  while($donnees=$reponse_entraineur->fetch()){
    $xml->startElement('entraineur');
    $xml->writeAttribute('id_entraineur', $donnees['ID_ENTRAINEUR']);
    $xml->writeAttribute('prenom', $donnees['PRENOM_ENTRAINEUR']);
    $xml->writeAttribute('nom', $donnees['NOM_ENTRAINEUR']);
    $xml->writeAttribute('description', $donnees['DESCRIPTION_ENTRAINEUR']);
    $xml->endElement();
  }

  while($donnees=$reponse_entrainement->fetch()){
    $xml->startElement('entrainement');
    $xml->writeAttribute('id', $donnees['ID_ENTRAINEMENT']);
    $xml->writeAttribute('heure_debut', $donnees['HEURE_DEBUT_ENTRAINEMENT']);
    $xml->writeAttribute('heure_fin', $donnees['HEURE_FIN_ENTRAINEMENT']);
    $xml->writeAttribute('niveau', $donnees['NIVEAU_ENTRAINEMENT']);
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->endElement();
  }

  while($donnees=$reponse_abonne->fetch()){
    $xml->startElement('abonne');
    $xml->writeAttribute('id', $donnees['ID_ABONNE']);
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
  while($donnees=$reponse_match->fetch()){
    $xml->startElement('match_tennis');
    $xml->writeAttribute('id', $donnees['ID_MATCH']);
    $xml->writeAttribute('heure_debut', $donnees['HEURE_DEBUT_MATCH']);
    $xml->writeAttribute('heure_fin', $donnees['HEURE_FIN_MATCH']);
    $xml->writeAttribute('competition', $donnees['COMPETITION_MATCH']);
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->writeAttribute('id_terrain', $donnees['ID_TERRAIN']);
    $xml->endElement();
  }
  while($donnees=$reponse_avatar->fetch()){
    $xml->startElement('avatar');
    $xml->writeAttribute('id', $donnees['ID_AVATAR']);
    $xml->writeAttribute('fileName', $donnees['FILENAME_AVATAR']);
    $xml->writeAttribute('id_abonne', $donnees['ID_ABONNE']);
    $xml->endElement();
  }
  while($donnees=$reponse_image->fetch()){
    $xml->startElement('image_pw');
    $xml->writeAttribute('id', $donnees['ID_IMAGE']);
    $xml->writeAttribute('fileName', $donnees['FILENAME_IMAGE']);
    $xml->endElement();
  }
  while($donnees=$reponse_abonne_perd_match->fetch()){
    $xml->startElement('abonne_perd_match');
    $xml->writeAttribute('id_abonne', $donnees['ID_ABONNE']);
    $xml->writeAttribute('id_match', $donnees['ID_MATCH']);
    $xml->endElement();
  }
  while($donnees=$reponse_abonne_gagne_match->fetch()){
    $xml->startElement('abonne_gagne_match');
    $xml->writeAttribute('id_abonne', $donnees['ID_ABONNE']);
    $xml->writeAttribute('id_match', $donnees['ID_MATCH']);
    $xml->endElement();
  }
  while($donnees=$reponse_entrainement_a_lieu_sur_terrain->fetch()){
    $xml->startElement('entrainement_a_lieu_sur_terrain');
    $xml->writeAttribute('id_terrain', $donnees['ID_TERRAIN']);
    $xml->writeAttribute('id_entrainement', $donnees['ID_ENTRAINEMENT']);
    $xml->endElement();
  }
  while($donnees=$reponse_entrainement_a_entraineur->fetch()){
    $xml->startElement('entrainement_a_entraineur');
    $xml->writeAttribute('id_entrainement', $donnees['ID_ENTRAINEMENT']);
    $xml->writeAttribute('id_entraineur', $donnees['ID_ENTRAINEUR']);
    $xml->endElement();
  }
  while($donnees=$reponse_entraineur_travaille_pour_club->fetch()){
    $xml->startElement('entraineur_travaille_pour_club');
    $xml->writeAttribute('id_entraineur', $donnees['ID_ENTRAINEUR']);
    $xml->writeAttribute('id_club', $donnees['ID_CLUB']);
    $xml->endElement();
  }

$xml->endElement();
$xml->flush();
?>