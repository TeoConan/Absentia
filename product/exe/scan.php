<?php
$_GET['query'] = 'getlistpromo';

include('function.php');

//Get promos
if ($_GET['query'] == 'getlistpromo'){
	
	$namefile = 'class.csv';
	$promos = getPromos($namefile);
	
	
	//Construire les promotions en HTML grâce au tableau $promos
	foreach ($promos as $element){
		$output = '<li class="item-promotion">';
		$output .= buildPromoItem($element, '');
		$output .= '</li>';
		echo($output);
	}
}



?>