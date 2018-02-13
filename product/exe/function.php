<?php

//Contruire le HTML d'un item promotion
function buildPromoItem($promo, $responsable){
	//$promo = iconv("UTF-8","ISO-8859-1//IGNORE",$promo);
	//$responsable = iconv("UTF-8","ISO-8859-1//IGNORE",$responsable);
	
	$output = '
		<div class="item promotion">
				<div class="inner">
					<img src="res/icons/ic_add_circle_outline_white.svg" alt="Ajouter" class="icon"/>
					<p><span>' . $promo . '</span>
					</p>
				</div>
			</div>
		</a>
	';
	return($output);
}

function foundResponsable($promo){
	
}

//Obtenir toutes les promotions disponible dans le fichier Excel
function getPromos($namefile){
	$file = fopen('http://localhost/Absentia/product/exe/temp/' . $namefile, 'r');
	$text = array();
	fgets($file);

	while (!feof($file)){
		$lines[] = html_entity_decode(utf8_encode(fgets($file)));
	}

	//echo($lines[1]);
	
	$promos = array();
	$temp = array();

	for($i=0;$i<sizeof($lines);$i++){
		$temp = (explode(';', $lines[$i])); 
		if (!empty($temp[1])){
			$promos[] = $temp[1];
		}
	}

	$promos = auto_remove_double($promos);
	
	return($promos);
}

//Obtenir uniquement la promotion
function getOnlyPromos($namefile, $promo){
	//echo('Search promo = ' . $promo);
	$file = fopen('temp/' . $namefile, 'r');
	$text = array();
	fgets($file);
	
	while (!feof($file)){
		$lines[] = html_entity_decode(utf8_encode(fgets($file)));
	}
	
	$student = array();
	$temp = array();

	for($i=0;$i<sizeof($lines);$i++){
		$temp = (explode(';', $lines[$i])); 
		if (!empty($temp[1])){
			if ($temp[1] === $promo){
				$student[] = $temp;
			}
		}
	}
	
	return($student);
}

function auto_remove_double($array){
	$newarray = array();

	for($i = 1; $i < sizeof($array); $i++){
		if (!exist_in_tab($array[$i], $newarray)){
			$newarray[] = $array[$i];
		}
	}

	return($newarray);
}

function remove_if_exist($key, $array){
	for($i = 0; $i < sizeof($array); $i++){
		if($key == $array[$i]){
			array_splice($array, $i, 1);
		}
	}

	return $array;
}


function exist_in_tab($key, $array) {
	$exist = false;

	foreach($array as $elem){
		if($key == $elem){
			$exist = true;
		}
	}

	return $exist;
}
?>