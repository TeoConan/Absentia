<!doctype html>

<?php
	include('button.php');


	$error = false;
	$exist = false;

	if(!empty($_GET['error'])){
		if($_GET['error'] == 1){$error = true;}
	}

	if (empty($_GET['file'])){
		$error = true;
	} else {
		if ($_GET['file'] == ""){$error = true;}
		if (file_exists('product/exe/temp/' . $_GET['file'])){
			$exist = true;
		} else {
			$exist = false;
		}
	}

	
/*	echo('Error = ' . $error . '<br/>');
	echo('Exist = ' . $exist . '<br/>');
	echo('CExist = ' . ($exist == false) . '<br/>');*/
?>


<html>
<head>
	<link rel="stylesheet" href="css/style.css" />
	<script src="jquery.min.js"></script>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="res/icons/logo.ico" />
	<title>Absentia - Promotions</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="page-preview">

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
					
				</div>

			</div>
		</header>
		
		

		<main class="block-center">
			<div class="inner">
				<div class="inner-button">
					<a class="button default" target="help.php" href="help.php">
						<span>
							BESOIN D'AIDE ?
						</span>
					</a>
				</div>

				<div class="inner-button" style="margin-bottom: 0;">

					<?php
						if (!$error && $exist){
							$buttonnav = new Button('TÉlÉCHARGER', true);
							$buttonnav->setLink('');
							$buttonnav->addClass('dl');
							echo($buttonnav->getOutput());
						}

					?>
				</div>

				<div class="loader" id="loader">
					<img src="img/loader.gif"/>
				</div>
					
				<div class="block-list">
					<div class="inner">
						<div class="recherche">
							<div class="select-all" id="select_all">
								<img src="res/icons/ic_check_grey_24px.svg" id="img_uncheck">
							</div>
						
							<div class="change-view" id="switch_view">
								<img src="res/icons/icon_list_grey.svg" id="">
							</div>
							
							
							<img src="img/ic_search_black_24px.svg" id="img_search">
							<input type="text" name="name" id="input_search" placeholder="Rechercher">
						</div>
						
						<ul class="content-promotion">
						
							<?php
							if (!$error){
								if ($exist){
									include('product/exe/scan.php');
								} else {
									echo('<p class="error">Une erreur est survenue<br/>Le fichier demandé n\'est plus disponible</p>');
									$bterror = new Button('Accueil', true);
									$bterror->setLink('index.php');
									echo('<div class="inner-button error">');
									echo($bterror->getOutput());
									echo('</div>');
								}
							} else {
								echo('<p class="error" style="display : block;">Une erreur est survenue dans le traitement du fichier</p>');
								$bterror = new Button('Accueil', true);
								$bterror->setLink('index.php');
								echo('<div class="inner-button error">');
								echo($bterror->getOutput());
								echo('</div>');
							}
							
							
							?>
						</ul>
						
						<p class="error search">Aucun résultat.</p>
					</div>
				</div>
			</div>
				
			<div class="inner-button">
					<?php
						if (!$error && $exist){
							echo($buttonnav->getOutput());
						}

					?>
				</div>
				
			<div>
				<a id="redirect" style="display: none;" target="_blank" href="">Télécharger</a>
			</div>
		</div>
	</main>	
	<footer class="block-footer">
		<div class="inner">
			<a href="#">Mentions légales</a>
			<a href="https://www.espl.fr">ESPL.fr</a>
			<a href="https://planning-espl.eduservices.org/hp/">Hyperplanning</a>
			<p id="linkpopup">Signaler un problème</p>
			
		</div>
	</footer>
	
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
	<script type="text/javascript" src="script.js"></script>
	<script src="popup.js"></script>
	<div style="display: none; position: fixed; bottom: 0;height: 500px;background-color: white;width: 300px;right: 0; overflow: scroll;">
		<button id="clear" style=" right: 0; position: absolute;">Clear</button>
		<p id="console"></p>
	</div>
	
	<div class="toast">
		<p></p>
	</div>
</body>

	
	
</html>
