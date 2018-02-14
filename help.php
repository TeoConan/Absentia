<?php 
	include('button.php');		
?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css" />
	<title>Absentia - Aide</title>
	<link rel="icon" type="image/png" href="res/icons/logo.ico" />
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
	
	
		<h1 class="title">Absentia - Débuter</h1>
	
		<div class="inner">
			
			<section>
				<h2>À quoi sert Absentia ?</h2>
				<p>Il s'agit d'une plateforme créée spécialement pour le campus de l'ESPL. Elle permet à l'administration de gérer les absences des étudiants de manière plus simple et efficace. A partir d'un fichier Excel, il sera généré des "Absentia List". Sur ces dernières figureront le résumé des absences de chaque élève en fonction de la promotion choisie.</p>
			</section>
			
			<div class="separator"></div>
			
				<h2>Comment l'utiliser ?</h2>
				<p>Sur la page d'accueil, il vous suffit de cliquer sur le bouton importer. Sélectionnez et ouvrez le fichier Excel (au <a href="https://support.office.com/fr-fr/article/cr%C3%A9er-ou-modifier-des-fichiers-csv-%C3%A0-importer-dans-outlook-4518d70d-8fe9-46ad-94fa-1494247193c7">format CSV</a>). Choisissez les promotions pour lesquelles vous souhaitez générer des Absentia List et cliquez sur télécharger, elles seront alors automatiquement générées. </p>
			
		</div>
		
		<h1 class="title2">Absentia - Aide</h1>
	
		<div class="inner2">
			
			<section>
				<h2>Comment importer un fichier au format CSV ?</h2>
				<p>Absentia à besoin de fichiers Excel au format CSV pour pouvoir fonctionner, pour savoir comment exporter un fichier au format CSV <a href="https://support.office.com/fr-fr/article/cr%C3%A9er-ou-modifier-des-fichiers-csv-%C3%A0-importer-dans-outlook-4518d70d-8fe9-46ad-94fa-1494247193c7">c'est par ici</a>.</p>
			</section>
		
		</div>
	</main>
	
	<footer class="block-footer">
		<div class="inner">
			<a href="https://www.espl.fr/mentions-legales">Mentions légales</a>
			<a href="https://www.espl.fr">ESPL.fr</a>
			<a href="https://planning-espl.eduservices.org/hp/">Hyperplanning</a>
			<p id="linkpopup">Signaler un problème</p>
		</div>
	</footer>

</body>
</html>