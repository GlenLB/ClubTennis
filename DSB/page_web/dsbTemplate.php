<?php
// Inclusion du head
include_once $rootDir . "/templates/partials/headPartial.php";?>

	<main id="dsbMain">
		<h1><i class="fas fa-database"></i> DSB <i class="fas fa-database"></i></h1>
        <h2>Présentation du domaine</h2>
        <p>Nous avons décidé pour le cadre de ce projet de DSB de réaliser une base de données relationelle modélisant un club de tennis. Plus précisément, nous modélisons une franchise d'un club de tennis, cette franchise ayant des clubs dans toute la France.</p>
		<h2>MCD : Modèle conceptuel des données &#x2022; Merise</h2>
		<img id="mcd" src="<?=$fullHost?>/DSB/merise/mcd.png" alt="MCD merise">
		<h2>Requêtes SQL intéressantes à exécuter sur la BDD</h2>
		<div id="requetesSQL">
			<!-- Requête a -->
			<h4>Requête a</h4>
			<script src="https://gist.github.com/GlenLB/90908cd3a9724bc770071524de720f10.js"></script>
			<a href="#1" class="btn" data-sql="SELECT PRENOM_ABONNE FROM ABONNE WHERE ID_ABONNE = 24;">EXECUTER LA REQUÊTE</a>
			<!-- Requête b -->
			<h4>Requête b</h4>
			<script src="https://gist.github.com/GlenLB/df9e092038da8bd89255ed8fe60f6757.js"></script>
			<a href="#1" class="btn" data-sql="SELECT ABONNE.PRENOM_ABONNE, ABONNE.NOM_ABONNE, CLUB.NOM_CLUB FROM ABONNE NATURAL JOIN CLUB;">EXECUTER LA REQUÊTE</a>
			<!-- Requête c -->
			<h4>Requête c</h4>
			<script src="https://gist.github.com/GlenLB/a5af52ea1a6570c74f4320d15c19c329.js"></script>
			<a href="#1" class="btn" data-sql="SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(HEURE_FIN_MATCH, HEURE_DEBUT_MATCH)))) AS DUREE_MOYENNE_MATCH FROM MATCH_TENNIS;
">EXECUTER LA REQUÊTE</a>
			<!-- Requête d -->
			<h4>Requête d</h4>
			<script src="https://gist.github.com/GlenLB/19632871cf25302c981ae1e523dc7679.js"></script>
			<a href="#1" class="btn" data-sql="SELECT ABONNE.ID_ABONNE, ABONNE.PRENOM_ABONNE, ABONNE.NOM_ABONNE, COUNT(*) AS NOMBRE_MATCHS_JOUES FROM ABONNE NATURAL JOIN ABONNE_GAGNE_MATCH GROUP BY ABONNE.ID_ABONNE UNION SELECT ABONNE.ID_ABONNE, ABONNE.PRENOM_ABONNE, ABONNE.NOM_ABONNE, COUNT(*) AS NOMBRE_MATCHS_JOUES FROM ABONNE NATURAL JOIN ABONNE_PERD_MATCH GROUP BY ABONNE.ID_ABONNE ORDER BY NOMBRE_MATCHS_JOUES DESC;
">EXECUTER LA REQUÊTE</a>
			<!-- Requête e -->
			<h4>Requête e</h4>
			<script src="https://gist.github.com/GlenLB/6af8ce92a41d357c0351095408aee4be.js"></script>
			<a href="#1" class="btn" data-sql="SELECT DISTINCT ABONNE.ID_ABONNE, ABONNE.PRENOM_ABONNE, ABONNE.NOM_ABONNE FROM ABONNE NATURAL JOIN ABONNE_GAGNE_MATCH WHERE ABONNE.ID_ABONNE NOT IN (SELECT ABONNE.ID_ABONNE FROM ABONNE NATURAL JOIN ABONNE_PERD_MATCH);
">EXECUTER LA REQUÊTE</a>
			<!-- Requête f -->
			<h4>Requête f</h4>
			<script src="https://gist.github.com/GlenLB/b1d479a1c25b300455ead3486eeef05b.js"></script>
			<a href="#1" class="btn" data-sql="SELECT PRENOM_ABONNE, NOM_ABONNE, REDUCTION_ABONNE FROM ABONNE WHERE REDUCTION_ABONNE IN (SELECT DISTINCT REDUCTION_ABONNE FROM ABONNE WHERE REDUCTION_ABONNE = 1);
">EXECUTER LA REQUÊTE</a>
		</div>
		<!-- DTD -->
		<h2>DTD</h2>
		<script src="https://gist.github.com/GlenLB/ce9d68b1fc0dfd3e4f3a8daf3b98c6fb.js"></script>
		<!-- Script PHP to XML -->
		<h2>Script PHP pour traduction de la BDD en XML</h2>
		<script src="https://gist.github.com/GlenLB/990953f9ca2dfcfb6d0e16f04e51ef36.js"></script>
		<!-- XML obtenu -->
		<h2>Traduction XML de la BDD</h2>
		<script src="https://gist.github.com/GlenLB/4b545a56d6f7c30d5f2ed981db86465a.js"></script>
		<!-- Requête a) réalisée en XPATH sur le XML obtenu -->
		<h2>Requête a) en XPATH</h2>
		<script src="https://gist.github.com/GlenLB/3f6e937d0cfe620b43f6f848344455d1.js"></script>
		<!-- Exécution de la requête XPATH sur le XML obtenu -->
		<h2>Exécution de la requête a) en XPATH en PHP</h2>
		<script src="https://gist.github.com/GlenLB/8dcdb57d16486890f06469079692e230.js"></script>
		<!-- Requête SPARQL, et résultat de la requête sur DBPEDIA -->
		<h2>Requête SPARQL sur DBPEDIA et résultat de la requête</h2>
		<script src="https://gist.github.com/GlenLB/09167bfb1bb77bfba513da1e24256cff.js"></script>
	</main>

	<?php
// Inclusion du footer
include_once $rootDir . "/templates/partials/footerPartial.php";?>
