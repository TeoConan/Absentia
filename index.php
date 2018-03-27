<!doctype html>

<?php 
	include('button.php');		
?>

<html>
<head>
	<link rel="stylesheet" href="css/style.css" />
	<script src="jquery.min.js"></script>
	<link rel="icon" type="image/png" href="res/icons/logo.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Absentia</title>
</head>

<body>
	<?php
		include('popup.php');
	?>
	<div class="inner">
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
						<img src="img/Logo ESPL Campus V2 Blanc.png">
					</a>
				</div>
				<div class="nav-item">
					<div class="inner-button">
						<?php
						$buttonnav = new Button('BESOIN D\'AIDE ?', true);
						$buttonnav->setLink('help.php');
						$buttonnav->setBackColor('#f5f5f5');
						echo($buttonnav->getOutput());
						?>
	

					</div>
					
				</div>

			</div>
		</header>

		<main class="block-center">
			<h1 class="title">IMPORTER</h1>
			<h2 class="titlef">Tableau(x) d'absences de l'Hyperplanning</h2>
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

			<?php
			
			/*

			Errors :
			0		:	aucune erreur
			1		:	erreur extension
			2		:	erreur de lecture
			3		:	erreur de taille
			4		:	fichier déjà existant
			5		:	ok
			6		:	ok
			7		:	ok
			8		:	ok
			9		:	ok

			*/
			
			if (!empty($_GET['e']) && $_GET['e'] != 0 && $_GET['e'] < 3){
				echo('<p class="error">Une erreur est survenu lors de l\'importation du fichier');
				
				$output = '<p class="error">';
				
				switch($_GET['e']){
					case 1:
						$output .= 'Le fichier doit être être au format CSV <a class="error" href="https://support.office.com/fr-fr/article/cr%C3%A9er-ou-modifier-des-fichiers-csv-%C3%A0-importer-dans-outlook-4518d70d-8fe9-46ad-94fa-1494247193c7">Comment faire ?</a>';
						break;
						
					case 2:
						$output .= 'Une erreur de lecture, le fichier peut être endommagé';
						break;
				}
				
				$output .= '<br>Code d\'erreur ' . $_GET['e'];
				
				echo($output);
			}
			
			?>
			
		</main>
		
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
		
	<footer class="block-footer">
		<div class="inner">
			<a href="https://www.espl.fr/mentions-legales">Mentions légales</a>
			<a href="https://www.espl.fr">ESPL.fr</a>
			<a href="https://planning-espl.eduservices.org/hp/">Hyperplanning</a>
			<p id="linkpopup">Signaler un problème</p>
		</div>
	</footer>
	<div class="toast">
		<p></p>
	</div>

</body>

	<script src="popup.js"></script>	
		
</html>

