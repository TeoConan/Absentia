<!doctype html>

<?php
	include('button.php');


	$error = false;
	$exist = false;

	if (empty($_GET['file'])){$error = true;}
	if (file_exists('product/exe/temp/' . $_GET['file'])){$exist = true;}
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
						<img src="img/logo_1.png">
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
					
				</div>

			</div>
		</header>
		
		

		<main class="block-center">
			<div class="inner">
				<div class="inner-button">
					<?php
						if (!$error && $exist){
							$buttonnav = new Button('TÉlÉCHARGER', true);
							$buttonnav->setLink('');
							echo($buttonnav->getOutput());
						}

					?>
				</div>
				<div class="block-list">
					<div class="inner">
						<div class="recherche">
							<div class="select-all" id="select_all">
								<img src="res/icons/ic_check_grey_24px.svg" id="img_uncheck">
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
									echo('<p class="error">Une erreur est survenue</p>');
									$bterror = new Button('Accueil', true);
									$bterror->setLink('index.php');
									echo('<div class="inner-button error">');
									echo($bterror->getOutput());
									echo('</div>');
								}
							} else {
								echo('<p class="error">Une erreur est survenue</p>');
									$bterror = new Button('Accueil', true);
									$bterror->setLink('index.php');
									echo('<div class="inner-button error">');
									echo($bterror->getOutput());
									echo('</div>');
							}
							
							
							?>
						
							
							<!--
							<li class="item promotion">
								<div class="item promotion">
									<div class="inner">
										<img src="res/icons/ic_add_circle_outline_white.svg" alt="Ajouter" class="icon">
										<p>ASSISTANT DE GESTION 1�ANNEE , ASSISTANT DE GESTION 1�ANNEE ALTERNANT - 
										<span>Johan Marchesseau</span>
										</p>
									</div>
								</div>
							</li>
							<li class="item promotion">
								<div class="item promotion">
									<div class="inner">
										<img src="res/icons/ic_add_circle_outline_white.svg" alt="Ajouter" class="icon">
										<p>ASSISTANT DE GESTION 1�ANNEE , ASSISTANT DE GESTION 1�ANNEE ALTERNANT - 
										<span>Johan Marchesseau</span>
										</p>
									</div>
								</div>
							</li>
							<li class="item promotion">
								<div class="item promotion">
									<div class="inner">
										<img src="res/icons/ic_add_circle_outline_white.svg" alt="Ajouter" class="icon">
										<p>ASSISTANT DE GESTION 1�ANNEE , ASSISTANT DE GESTION 1�ANNEE ALTERNANT - 
										<span>Johan Marchesseau</span>
										</p>
									</div>
								</div>
							</li>
							<li class="item promotion">
								<div class="item promotion">
									<div class="inner">
										<img src="res/icons/ic_add_circle_outline_white.svg" alt="Ajouter" class="icon">
										<p>ASSISTANT DE GESTION 1�ANNEE , ASSISTANT DE GESTION 1�ANNEE ALTERNANT - 
										<span>Johan Marchesseau</span>
										</p>
									</div>
								</div>
							</li>
							<li class="item promotion">
								<div class="item promotion">
									<div class="inner">
										<img src="res/icons/ic_add_circle_outline_white.svg" alt="Ajouter" class="icon">
										<p>ASSISTANT DE GESTION 1�ANNEE , ASSISTANT DE GESTION 1�ANNEE ALTERNANT - 
										<span>Johan Marchesseau</span>
										</p>
									</div>
								</div>
							</li>
							<li class="item promotion">
								<div class="item promotion">
									<div class="inner">
										<img src="res/icons/ic_add_circle_outline_white.svg" alt="Ajouter" class="icon">
										<p>ASSISTANT DE GESTION 1�ANNEE , ASSISTANT DE GESTION 1�ANNEE ALTERNANT - 
										<span>Johan Marchesseau</span>
										</p>
									</div>
								</div>
							</li>
							
							-->
						</ul>
					</div>
				</div>
			</div>
				
			<div class="inner-button">
					<?php
						if (!$error && $exist){
							$buttonnav = new Button('TÉlÉCHARGER', true);
							$buttonnav->setLink('');
							$buttonnav->setID('download');
							echo($buttonnav->getOutput());
						}

					?>
				</div>
		</div>
	</main>	
	<footer class="block-footer">
		<div class="inner">
			<a href="#">Mentions légales</a>
			<a href="https://www.espl.fr">ESPL.fr</a>
			<a href="https://planning-espl.eduservices.org/hp/">Hyperplanning</a>
			<a href="#">Signaler un problème</a>
		</div>
	</footer>
	
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" accept=".csv" name="fileToUpload" id="fileToUpload" style="display: none;">
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
	<script type="text/javascript" src="script.js"></script>
	
</body>
</html>
