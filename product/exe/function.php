<?php

if(!empty($_GET['action'])){
	if($_GET['action'] == "clean"){
		launchCleaning();
	}
	
	if($_GET['action'] == "count"){
		countStudents($_GET['file']);
	}
}


//Contruire le HTML d'un item promotion
function buildPromoItem($promo, $responsable, $number = -1){
	//$promo = iconv("UTF-8","ISO-8859-1//IGNORE",$promo);
	//$responsable = iconv("UTF-8","ISO-8859-1//IGNORE",$responsable);
	
	$output = '
		<div class="item promotion">
				<div class="inner">
					<img src="res/icons/ic_add_circle_outline_white.svg" alt="Ajouter" class="icon"/>
					<p>';
	if($number != -1){$output .= '(' . $number . ') ';}	
	$output .=	'<span>' . $promo . '</span>
					</p>
				</div>
			</div>
		</a>
	';
	return($output);
}

function countStudents($namefile){
	$promos = array();
	$pathfile = './product/exe/temp/' . $namefile;
	
	if(file_exists($pathfile)){
		$file = fopen($pathfile, 'r');
		$text = array();

		while (!feof($file)){
			$lines[] = html_entity_decode(utf8_encode(fgets($file)));
		}

		//echo($lines[1]);
		$temp = array();
		
		for($i=0;$i<sizeof($lines);$i++){
				$temp = (explode(';', $lines[$i])); 
				if (!empty($temp[1])){
					if(!isset($promos[$temp[1]])){
						$promos[$temp[1]] = 1;
					} else {
						$promos[$temp[1]] += 1;
					}				}
		}

		//print_r($promos);
	} else {
		echo('File not found');
	}

	return($promos);
}

//Obtenir toutes les promotions disponible dans le fichier Excel
function getPromos($namefile){
	$promos = array();
	$pathfile = './product/exe/temp/' . $namefile;
	
	if(file_exists($pathfile)){
		$file = fopen($pathfile, 'r');
		$text = array();

		while (!feof($file)){
			$lines[] = html_entity_decode(utf8_encode(fgets($file)));
		}

		//echo($lines[1]);
		$temp = array();
		
		for($i=0;$i<sizeof($lines);$i++){
				$temp = (explode(';', $lines[$i])); 
				if (!empty($temp[1])){
					$promos[] = $temp[1];
				}
		}

		$promos = auto_remove_double($promos);
	} else {
		echo('File not found');
	}

	return($promos);
}

//Maintenance

//Supprimer un document si vieux de 1 semaine (604 800sec)
function delOldFile($file, $del = true, $debug = false){
	$output = false;
	
	if ((time()-filectime($file)) > 604800){
		if($del){
			if($debug){echo('<br><strong>Del file ' . $file . '</strong>');}
			if (strpos($file, 'index.php') !== false) {
				unlink($file);
			}
			$output = true;
		}
	} else {
		if($debug){echo('<br>Dont del file ' . $file . ' : time = ' . (time()-filectime($file)));}
	}
	
	return($output);
}

function launchCleaning(){
	//http://localhost/Absentia/product/exe/function.php?action=clean&from=debug
	
	$dirs = Array(
		"zip",
		"pdf",
		"merge",
		"temp"
	);
	$debug = false;

	if(isset($_GET['from'])){
		if($_GET['from'] == "debug"){
			$debug = true;
		}
	}
	
	for($i = 0; $i < sizeof($dirs);$i++){
		chmod($dirs[$i], 0777);
		$files = scandir($dirs[$i]);
		//array_splice($files, 1);
		if($debug){echo('<br><h1>Dir ' . getcwd() . '\\' .  $dirs[$i] . '</h1><br>');}
		if($debug){var_dump($files);}

		for($i1 = 0; $i1 < sizeof($files);$i1++){
			delOldFile($dirs[$i] . '/' . $files[$i1]);
		}
	}
	
	
		
}

//Maintenance

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


function exist_index($key, $array){
	$output = -1;
	
	for($i = 0; $i < sizeof($array); $i++){
		if($key == $elem){
			$output == $i;
		}
	}
	
	return($output);
}


?>