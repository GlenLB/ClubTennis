<?php
// Inclusion du head
include_once $rootDir . "/templates/partials/headPartial.php";?>

	<main id="galerieMain">

		<h1>Galerie de photos</h1>

		<?php
		// RÉCUPÉRATION DES IMAGES DANS LA BDD -------------------------
		// Informations de connexion
		$user = "glen";
		$pass = getenv("MYSQL_PASS");
		try {
			// Ouverture de la connexion
			$bdd = new PDO("mysql:host=localhost;dbname=CLUBTENNIS", $user, $pass);
			// Recuperation des images
			$reponse = $bdd->query("SELECT CONTENT FROM GALERIE ORDER BY ID");

			echo('<table id="galerie">');

			$i = 0;
			while ($donnees = $reponse->fetch()) {
				if ($i % 3 == 0) {
					echo '<tr>';
				}
				echo(
					"<td>
						<img src='statics/img/galerie/" . $donnees['CONTENT'] . "' alt='Image galerie EarthLoader' class='photo'/>
					</td>"
				);
				if ($i % 3 == 2) {
					echo '</tr>';
				}
				$i++;
			}

			$reponse->closeCursor();

			echo("</table>");

		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		} finally {
			// Fermeture de la connexion
			$req = null;
			$bdd = null;
		}
		?>

	</main>

	
<?php
// Inclusion du footer
include_once $rootDir . "/templates/partials/footerPartial.php";?>
