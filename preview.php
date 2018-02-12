<!doctype html>

<?php
	include('button.php');



?>


<html>
<head>
	<link rel="stylesheet" href="css/style.css" />
	<script src="jquery.min.js"></script>
	<meta charset="utf-8">
	<title>Absentia</title>
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
						$buttonnav->setLink('Lauralabest');
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
					$buttonnav = new Button('TÉlÉCHARGER', true);
					$buttonnav->setLink('Lauralabest');
					echo($buttonnav->getOutput());
				?>
			</div>
				<div class="block-list">
					<div class="inner">
						<div class="recherche">
							<img src="img/ic_search_black_24px.svg">
							<input type="text" name="name" id="name" placeholder="Rechercher">
						</div>
						<ul class="content">
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
						</ul>
					</div>
				</div>
			</div>
				
			<div class="inner-button">
				<?php
					$buttonnav = new Button('TÉlÉCHARGER', true);
					$buttonnav->setLink('Lauralabest');
					echo($buttonnav->getOutput());
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
</body>
</html>
