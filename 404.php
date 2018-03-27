<!doctype html>

<?php 
	include('product/res/includes/button.php');
?>

<html>
<head>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="icon" type="image/png" href="res/icons/logo.ico" />
	<script src="product/res/vendor/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Absentia - 404</title>
</head>

<body class="page-404">
	<?php
		include('product/res/includes/popup.php');
	?>
	<div class="inner">
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
			<div class="card">
				<h1>Erreur 404</h1>
				<h2>Page introuvable</h2>
				
				<div class="inner-button">
					<?php
					$buttonnav = new Button('ACCUEIL', true);
					$buttonnav->setLink('./');
					echo($buttonnav->getOutput());
					?>
				</div>
			</div>
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

