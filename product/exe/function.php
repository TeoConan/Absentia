<?php

if(!empty($_GET['action'])){
	if($_GET['action'] == "clean"){
		launchCleaning();
	}
}


//Contruire le HTML d'un item promotion
function buildPromoItem($promo, $responsable){
	//$promo = iconv("UTF-8","ISO-8859-1//IGNORE",$promo);
	//$responsable = iconv("UTF-8","ISO-8859-1//IGNORE",$responsable);
	
	$output = '
		<div class="item promotion">
				<div class="inner">
					<img src="res/icons/ic_add_circle_outline_white.svg" alt="Ajouter" class="icon"/>
					<p>';
	$output .=	'<span>' . $promo . '</span>
					</p>
				</div>
			</div>
		</a>
	';
	return($output);
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
					$temp[1] = clearPromo($temp[1]);
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
	
	if ((time()-filectime($file)) > 1512000){
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

//Découper le nom d'une promo pour différencier l'année et le nom
function clearPromo($name){
		$initName = $name;
		$output = $initName;
		//echo('Check name promo ' . $name . '<br/>');
		$name = explode(',', $name);
		$name = $name[sizeof($name)-1];
		$yearvalidate = "°";
		$posyear = indexFirstNumber($name);
		$year = findFirstNumber($name);
		
		//echo('<p>lenght / name : ' . $name . ' size name ' . strlen($name) . '</p>');
	
		if(strlen($name)-1 >= $posyear+1 || strlen($name)-1 >= $posyear+2) {
			// Pos after year										Cas d'espace 
			if((ord($name[$posyear+1])) === (ord($yearvalidate)) || (ord($name[$posyear+2])) === (ord($yearvalidate))){
				//echo('Année validée');

				$name = substr($name, 0, $posyear-1);

				$output = Array();
				$output['name'] = trim($name);
				$output['year'] = trim($year);

				$output = trim($name);
			} else {

				//Arrangement
				$output = $initName;
			}
		} else {
			//echo('<p>Error lenght / name : ' . $name . ' size name ' . strlen($name) . '</p>');
		}
			
		
		return($output);
	}
	
	function findFirstNumber($string){
		$filteredNumbers = array_filter(preg_split("/\D+/", $string));
		$firstOccurence = reset($filteredNumbers);
		return($firstOccurence);
	}
	
	function indexFirstNumber($text){
		preg_match('/^\D*(?=\d)/', $text, $m);
		return isset($m[0]) ? strlen($m[0]) : false;
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