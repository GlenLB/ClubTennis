<?php
$xml = simplexml_load_file("clubTennis.xml");

$result = $xml->xpath("/mon_club//abonne[@id='24']/@prenom");

print_r($result);
?>