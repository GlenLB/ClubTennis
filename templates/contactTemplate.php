<?php
// Inclusion du head
include_once $rootDir . "/templates/partials/headPartial.php";?>

	<main id="contactMain">
		<h1>Contactez Earthloader</h1>
		<div id="contactContainer">
			<form class="formulaire">
				<h2>Par email</h2>
				<input type="email" placeholder="Email" required />
				<textarea placeholder="Message" required></textarea>
				<a href="#1" class="btn">ENVOYER</a>
			</form>

			<div id="contact_autre">
				<p id="paragraphe1">
					<i class="fas fa-phone-square"></i><br/>
					06 05 63 66 36
				</p>
				<p>
					<i class="fas fa-envelope"></i><br/>
					earthloader@clubtennis.fr
				</p>
				<p>
					<i class="fas fa-location-arrow"></i><br/>
					Club de Tennis Earthloader<br/>
					1 rue de la Salle, <br/>
					85100, Les Sables-d'Olonne
				</p>
				<p>
					<h3>Horaires</h3>
					<ul>
						<li>Du lundi au samedi de 9h00 à 12h00</li>
						<li>Dimanche de 14h30 à 19h30</li>
					</ul>
				</p>
			</div>
		</div>

		<div id="carte">
			<h2><i class="fas fa-map-marked-alt"></i> Plan d'accès</h2>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d21969.671814170397!2d-1.7974654!3d46.5039736!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4804678ad779b81f%3A0x40d37521e09b240!2s85100+Les+Sables-d&#39;Olonne!5e0!3m2!1sfr!2sfr!4v1552032541414" frameborder="0" style="border:1" allowfullscreen></iframe>
		</div>
	</main>

<?php
// Inclusion du footer
include_once $rootDir . "/templates/partials/footerPartial.php";?>