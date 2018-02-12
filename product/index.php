<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
       	<script src="res/includes/jquery.min.js"></script>
        <title></title>
    </head>

   <?php
	
	include('res/includes/button.php');
	
	?>
   
    <body>
		<div>
			<div id="text">Console</div>
		</div>
		
		<div class="inner-button">
			<?php

			//Création d'un object Button

			$btget = new Button('Download', true);
			$btget->setID('btget');
			echo($btget->getOutput());

			?>
		</div>
		
		<div class="inner-button">
			
			<?php
		
			$btget = new Button('Get', true);
			$btget->setID('getpromo');
			echo($btget->getOutput());
		
		?>
		</div>
		
		<div>
			<ul id="list-promo">
	
			</ul>
		</div>
		
		
		
		<script src="script.js"></script>
    </body>
</html>