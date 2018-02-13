<?php 
	include('button.php');		
?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css" />
	<title>Absentia - Aide</title>
</head>
<body class="page-help">

	<div class="background"></div>
	<header class="block-header">
		<div class="inner">
			<div class="absentia nav-item">
				<a href="index.php">
					<img src="img/absentia white.svg" alt="Absentia"/>
				</a>
			</div>
			<div class="espl nav-item">
				<a href="https://www.espl.fr">
					<img src="img/logo_1.png">
				</a>
			</div>
			<div class="nav-item">
				<div class="inner-button">
					<?php
					$buttonnav = new Button('ACCUEIL', true);
					$buttonnav->setLink('index.php');
					echo($buttonnav->getOutput());
					?>


				</div>

			</div>

		</div>
	</header>

	<main class="block-center">
	
		<h1 class="title">Absentia - Aide</h1>
	
		<div class="inner">
			
			<section>
				<h2>Importer un fichier au format CSV ?</h2>
				<p>Absentia à besoin de fichier Excel au format CSV pour pouvoir fonctionner, pour exporter un fichier au format CSV <a href="https://support.office.com/fr-fr/article/cr%C3%A9er-ou-modifier-des-fichiers-csv-%C3%A0-importer-dans-outlook-4518d70d-8fe9-46ad-94fa-1494247193c7">c'est par ici</a></p>
			</section>
			
			<div class="separator"></div>
			
			<section>
				<h2>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a ligula id massa accumsan pellentesque. Nulla facilisi. Donec scelerisque posuere interdum. Vestibulum tristique sed nisl non laoreet. In odio elit, imperdiet vel nibh sed, auctor bibendum ex. Aenean maximus hendrerit euismod. In purus nibh, varius in faucibus a, iaculis a eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque at tincidunt magna. Suspendisse ut ex luctus, ullamcorper augue nec, semper metus. Morbi sed mauris vitae nunc congue egestas. Curabitur quis hendrerit velit.</p>
			</section>
		</div>
	</main>

</body>
</html>