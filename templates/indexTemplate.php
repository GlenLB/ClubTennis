<?php
// Inclusion du head
include_once $rootDir . "/templates/partials/headPartial.php"; ?>

	<main>
		<!-- Image de fond -->
		<div id="background"></div>
		<!-- Button inscription -->
		<a id="btnInscription" class="btn" href="/inscription">S'INSCRIRE AU CLUB</a>
		<!-- Arrow -->
		<a id="arrow" href="#arrow">
			<span></span>
			<span></span>
		</a>

		<h1>Decouverte de notre club Earthloader</h1>
		<section id="section1" class="section">
			<img src="<?= $fullHost . '/statics/img/terrain_tennis_exterieur.jpg' ?>" />
			<p>
				Notre club de tennis, Earthloader, possède de sublimes terrains extérieurs se situant au bord de la mer. Ainsi, qu'un complexe intérieur se trouvant à 500 mètres de la plage. Cela permet ainsi de pratiquer en été comme en hiver (Et oui, même pendant les vacances !). Chaque année, de nouvelles recrues font leur apparition au sein de notre club. Cette nouvelle ère de fraicheur permet de faire agrandir notre club ainsi que notre équipe de professionnels encadrants. Si vous voulez profiter d'autres photos sur notre club ainsi que sur sa situation géographique, je vous convie à aller dans notre <a id="mot" href="galerie.html"><em>galerie</em></a>.
			</p>
		</section>
		<section id="section2" class="section">
			<div id="containerContactIndex">
				<h2>Contactez-nous</h2>
				<p>
					<i class="fas fa-phone-square"></i><br>
					06 05 63 66 36<br>
					<i class="fas fa-envelope"></i><br>
					earthloader@clubtennis.fr<br>
					<i class="fas fa-location-arrow"></i><br>
					Club de Tennis Earthloader<br>
					1 rue de la Salle, <br>
					85100, Sable d'Olonne <br><br>
					Horaires : du lundi au samedi de 9h00 à 12h00 puis de 14h30 à 19h30.
				</p>
			</div>
			<!-- Carte Google Maps -->
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d21969.671814170397!2d-1.7974654!3d46.5039736!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4804678ad779b81f%3A0x40d37521e09b240!2s85100+Les+Sables-d&#39;Olonne!5e0!3m2!1sfr!2sfr!4v1552032541414" frameborder="0" style="border:0" allowfullscreen></iframe>
		</section>
	</main>

	<?php
// Inclusion du footer
include_once $rootDir . "/templates/partials/footerPartial.php"; ?>
