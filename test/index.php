<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
<?php
	
	echo('<h1>Promo = ' . (clearPromo('ASSISTANT MANAGER 1° ANNEE ALTERNANT , ASSISTANT MANAGER 1°ANNEE')['name']) . '</h1>');
	
	function clearPromo($name){
		$name = explode(',', $name);
		$name = $name[sizeof($name)-1];
		$yearvalidate = "°";
		$posyear = indexFirstNumber($name);
		$year = findFirstNumber($name);
		
		// Pos after year
		if(ord($name[$posyear+1]) == ord($yearvalidate)){
			echo('Année validée');
			
			$name = substr($name, 0, $posyear-1);
			
			$output = Array();
			$output['name'] = $name;
			$output['year'] = $year;
		}
		
		print_r($output);
		
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
	
	?>

</body>
</html>