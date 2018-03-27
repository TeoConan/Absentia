<?php 
	include('product/res/includes/button.php');
?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css" />
	<script src="product/res/vendor/jquery.min.js"></script>
	<title>Absentia - Aide</title>
	<link rel="icon" type="image/png" href="res/icons/logo.ico" />
</head>
<body class="page-help">

<?php
		include('product/res/includes/popup.php');
?>
	
	<div class="overlay" id="viewer-overlay" style="display: none;">
		<div class="viewer">
			<img src="img/table.png">
		</div>
	</div>

	<div class="background"></div>
	<header class="block-header">
		<div class="inner">
			<div class="absentia nav-item">
				<a href="./">
					<img src="img/absentia white.svg" alt="Absentia"/>
				</a>
			</div>
			<div class="espl nav-item">
				<a href="https://www.espl.fr">
					<img src="img/Logo ESPL Campus V2 Blanc.png">
				</a>
			</div>
			<div class="nav-item">
				
				<div class="inner-button">
				<?php
					$buttonnav = new Button('IMPORTER', true);
					$buttonnav->setID('button_choose');
					echo($buttonnav->getOutput());
				?>
				</div>

				<!--<form action="upload.php" method="post" enctype="multipart/form-data">-->
				<form action="upload.php" method="post" enctype="multipart/form-data">

					<input type="file" accept=".csv" name="fileToUpload[]" id="fileToUpload" multiple style="display: none;">
					<input type="submit" value="Upload Image" name="submit" id="submit"  style="display: none;">
				</form>
				
				<script type="text/javascript">
					var button_choose = document.getElementById('button_choose');
					var fileChooser = document.getElementById('fileToUpload');
					var submiter = document.getElementById('submit');

					fileChooser.addEventListener('change', function(){
						submiter.click();
					}, false);

					button_choose.addEventListener('click', function(){
						fileChooser.click();
					}, false);
				</script>

			</div>

		</div>
	</header>

	<main class="block-center">
	
	
		<h1 class="title">Absentia - Débuter</h1>
	
		<div class="inner">
			
			<section>
				<div class="question"><h2>À quoi sert Absentia</h2><img src="img/iconquestion.svg" id="interrogation"><script src="help.js"></script>	</div>
				<p>Il s'agit d'une plateforme créée spécialement pour le campus de l'ESPL. Elle permet à l'administration de gérer les absences des étudiants de manière plus simple et efficace. A partir d'un fichier Excel, il sera généré des "Absentia List <span><img class="mini-quote" src="img/iconquestion.svg"/></span>". Sur ces dernières figureront le résumé des absences de chaque élève en fonction de la promotion choisie.</p>
			</section>
			
			<div class="separator"></div>
			
				<h2>Comment l'utiliser ?</h2>
				<p>Sur la page d'accueil, il vous suffit de cliquer sur le bouton importer. Sélectionnez et ouvrez le(s) à fichier(s) Excel, au <a href="https://support.office.com/fr-fr/article/cr%C3%A9er-ou-modifier-des-fichiers-csv-%C3%A0-importer-dans-outlook-4518d70d-8fe9-46ad-94fa-1494247193c7">format CSV (séparateur points-virgules)</a>. Choisissez les promotions pour lesquelles vous souhaitez générer des Absentia List et cliquez sur télécharger, elles seront alors automatiquement générées.</p>
			
		</div>
		
		<h1 class="title">Absentia - Format de document</h1>
	
		<div class="inner">
			
			<section>
				<h2>Concernant le format du tableau</h2>
				<p>Le format du tableau à importer doit être composé d'un header (Étudiants, Promotions, H. Injustifiées)*, et du corps du tableau avec les différents étudiants, <a href="res/Absentia tab example.csv">télécharger un fichier d'exemple</a></p>
				<p>Si des élèves se trouvent en double dans le document, comme ci-dessous, leurs heures d'absences seront cumulées</p>
				<img src="img/formatexcel.png" class="format-excel"/>
				<p class="small">*Le nom des colonnes du header peuvent être changées</p>
			</section>
		
		</div>
		
		<h1 class="title">Absentia - Téléchargements</h1>
	
		<div class="inner">
			
			<section>
				<h2>Problème de téléchargement ?</h2>
				<p>Si lorsque vous cliquez sur "Télécharger" et que rien ne se passe, il est probable que votre navigateur bloque le téléchargement.<br/>Pour résoudre ce problème <a href="https://support.google.com/chrome/answer/95472?co=GENIE.Platform%3DDesktop&hl=fr">c'est par ici</a></p>
				<img src="img/exemple_popup_chrome.jpg" class="popup-blocker"/>
			</section>
		
		</div>
		
		<h1 class="title">Absentia - PDF</h1>
	
		<div class="inner">
			
			<section>
				<h2>Problème d'affichage des PDF</h2>
				<p>Si le document PDF semble comporter des erreurs comme l'image ci-dessous, c'est que le format du tableau est mauvais.<br/>Veuillez consulter la section <strong>Format de document</strong></p>
				<img src="img/bad_format.png" class=""/>
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

<script src="popup.js"></script>

</html>