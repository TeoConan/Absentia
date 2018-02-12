<!doctype html>

<?php 
	include('button.php');		
?>

<html>
<head>
	<link rel="stylesheet" href="css/style.css" />
	<meta charset="utf-8">
	<title>Absentia</title>
</head>

<body>
	<div class="inner">
		<div class="background"></div>
		<header class="block-header">
		
			<div class="inner">
				<div class="absentia nav-item">
					<img src="img/absentia white.svg" alt="Absentia"/>
				</div>
				<div class="espl nav-item">
					<img src="img/logo_1.png">
				</div>
				<div class="nav-item">
					<div class="inner-button">
						<?php
						$buttonnav = new Button('IMPORTER', true);
						$buttonnav->setLink('preview.php');
						echo($buttonnav->getOutput());
						?>
					</div>
					
				</div>

			</div>
		</header>

		<main class="block-center">
			<h1 class="title">IMPORTER</h1>
			<h2 class="titlef">Fiches absences</h2>
			<div class="inner-button">
				<?php
				$buttonnav = new Button('IMPORTER', true);
				$buttonnav->setLink('preview.php');
				echo($buttonnav->getOutput());
			?>
			</div>

		</main>
	</div>
		
	<footer class="block-footer">
		<div class="inner">
			<a href="https://www.espl.fr/mentions-legales">Mentions légales</a>
			<a href="https://www.espl.fr">ESPL.fr</a>
			<p id="msgpopup">Signaler un problème</p>
		</div>
	</footer>
	

</body>
		
	<script type="text/javascript">
		var lienpopup = document.getElementById('msgpopup');
		var body = document.body;
		
		lienpopup.addEventListener("click", afficherPopup, false);

		function afficherPopup(){
			sendQuery('popup.php', body, false);
		}

		function sendQuery(query, showin, erase){
			console.log('Function sendQuery');
			console.log("query : " + query);

			//instance de l'objet
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log("ShowMessage response = ");
					console.log(this.responseText);
					if (erase){
						showin.innerHTML = this.responseText;
					} else {
						showin.innerHTML += this.responseText;
					}
				}
			};

			xhttp.open("GET",query , true);
			xhttp.send();
		}
	</script>
</html>


