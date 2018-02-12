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

<body>
	<?php
		include('popup.php');
	?>
	<div class="inner">
		<div class="background"></div>
		<header class="block-header">
		
			<div class="inner">
				<div class="absentia nav-item">
					<img src="img/absentia white.svg" alt="Absentia"/>
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
			<h1 class="title">IMPORTER</h1>
			<h2 class="titlef">Fiches absences</h2>
			<form method="post" action="preview.php">
				<div class="inner-button">
				
				
						<!------------ RECUP FICHIER ENVOYÉ ---------------->
				<!----<input type="file" id="hiddenfile" style="display:none" name="file" onChange="getvalue();"/>---->
	
					 <!-- On limite le fichier à 100Ko -->
					 <input type="hidden" name="MAX_FILE_SIZE" value="100000">
					 Fichier : <input type="file" name="file">
					 <input type="submit" name="envoyer" value="Envoyer le fichier">
				</div>
			</form>
			

		</main>
	</div>
		
	<footer class="block-footer">
		<div class="inner">
			<a href="https://www.espl.fr/mentions-legales">Mentions légales</a>
			<a href="https://www.espl.fr">ESPL.fr</a>
			<a href="https://planning-espl.eduservices.org/hp/">Hyperplanning</a>
			<p id="linkpopup">Signaler un problème</p>
		</div>
	</footer>
	

</body>
		
	<script type="text/javascript">
					
		
					/* AFFICHAGE POPUP*/

		function hide (addr) {
			document.getElementById(addr).style.display = "none" ;
		}
		function show (addr) {
			document.getElementById(addr).style.display = "block" ;
		}
		
		function toggle () {
			if (document.getElementById('popup').style.display == "none") {
				show('popup');
			}else {
				hide('popup');
			}
		}
		window.onload = function() { hide ('popup'); };
		
		/*--------------------------------------------------*/
		
					/* FERMER POPUP */
		
		var lienpopup = document.getElementById('linkpopup');
		var body = document.body;
		var popup = document.getElementById('popup');
		var close = document.getElementById('close');
		var button_send = document.getElementById('button_send');
		
		lienpopup.addEventListener("click", toggle, false);
		close.addEventListener("click", toggle, false);
		button_send.addEventListener("click", sendform, false);
		
				
		/*--------------------------------------------------*/
		
					/* RECUPÉRATION DES DONNÉES */
			
		var input_name = document.getElementById("input_name"); 
		var input_mail = document.getElementById("input_mail"); 
		var input_message = document.getElementById("input_message");
		
		function button (){
			console.log(input_name.value);
			console.log(input_mail.value);
			console.log(input_message.value);
		}

		
		/*--------------------------------------------------*/
		
					/*ENVOI DU FORMULAIRE*/
		
		function sendform (){
		var sendtab = [];
		
		sendtab.push(input_name.value);
		sendtab.push(input_mail.value);
		sendtab.push(input_message.value);
		
		var sendData = function (){
			$.post('form.php', {
				data: sendtab
			}, function(response) {
				console.log(response);
			});
		}
		sendData();
	}
		

	
	
	</script>
</html>


