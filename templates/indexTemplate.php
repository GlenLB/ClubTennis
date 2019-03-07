<?php 
// Inclusion du head
includeHandleError("./templates/partials/headPartial.php"); ?>
<body>
	<header id="bloc_header">
		<div id ="logo">
			<img src = "images/image_header.png" alt="" />
			<h1><?php echo $page->h1 ?></h1>
		</div>
	</header>

	<nav>
		<div class="table">
			<ul>
				<li class="menu_index"><a href="index.html">Presentation</a></li>
				<li class="menu_formules"><a href="formules.html">Formules</a></li>
				<li class="menu_club"><a href="club.html">Club</a></li>
				<li class="menu_contact"><a href="contact.html">Contact</a></li>
			</ul>
		</div>
	</nav>

	<section id="bloc_section"></section>

	<aside></aside>

	<?php 
	// Inclusion du footer
	includeHandleError("./templates/partials/footerPartial.php"); ?>
	