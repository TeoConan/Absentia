<?php
$_GET['query'] = 'getlistpromo';

include('function.php');

//Get promos
if ($_GET['query'] == 'getlistpromo'){
	
	$namefile = $_GET['file'];

	$promos = getPromos($namefile);
	
	//Construire les promotions en HTML grâce au tableau $promos
	foreach ($promos as $element){
		$output = '<li class="item-promotion">';
		$output .= buildPromoItem($element, '');
		$output .= '</li>';
		echo($output);
	}
	
	if(sizeof($promos) == 0) {
		echo('<p class="error">Une erreur est survenue, <a style="color : black;" target="_blanck" href="help.php#docformat">cliquez ici pour plus d\'informations</a></p>');
	}
}



?>