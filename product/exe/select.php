<?php

include_once('../res/includes/student.php');
include_once('function.php');
include_once('../res/includes/absentialist.php');

set_time_limit(3600);
//print_r($_POST);
//print_r($_GET);

//Fichier à traiter dans /temp
$currentFile = $_GET['file'];
//Promotions selectionnées
$selectedPromotions = $_POST['data'];
//Les Absentia List (output)
$AbsentiaList = [];


//Pour chaque promotion
for ($i = 0; $i < sizeof($selectedPromotions); $i++){
	//Décoder les caractères speciaux
	$selectedPromotions[$i] = html_entity_decode($selectedPromotions[$i]);
	//Créer une absentia list avec une liste d'étudiant vide
	$AbsentiaList[$i] = new AbsentiaList($selectedPromotions[$i], array());
}


//Préparation à la lecture du fichier
$lines = [];
$file = fopen('temp/' . $currentFile, 'r');
$text = array();

//Détection de l'header du fichier
//Si le fichier excel a un header
//fgets($file);


//Pour chaque ligne du fichier
while (!feof($file)){
	//Décoder les lignes
	$entry = html_entity_decode(utf8_encode(fgets($file)));
	$lines[] = $entry;
	//Décomposer la chaine
	$read = explode(';', $entry);
	
	//Si le tableau de lecture de line est vide, la ligne est bugée ou vide
	if(!sizeof($read) == 0 && !empty($read[1])){
		//Récuperer la promotion de l'eleve (index 2)
		if(isset($read[1]) && !empty($read[1])){$promo = $read[1];}
		//Si la promotion de l'eleve est presente dans les promotions selectionné
		if(exist_in_tab($promo, $selectedPromotions)){
			
			//Si read[2] existe (qui correspondrai aux nombre d'heures cours manquées), l'intégrer dans le new Student
			$h_missed = "";
			if(isset($read[2]) && !empty($read[2])){$h_missed = $read[2];}
			
			//Creer l'object student
			//						Name	class	  date	hours	lessons	attach	motive	Sletter	Ssms justify
			$student = new Student($read[0], $read[1], '', $h_missed);

			//Récuperer l'Absentia List qui a le label similaire à la promotion de l'eleve
			$hispromo = $read[1];
			for($i = 0; $i < sizeof($AbsentiaList); $i++){
				//Si la classe de l'Absentia List est le même que celle de l'élève
				if($AbsentiaList[$i]->_class == $hispromo){
					//Ajouter l'objet dans la liste trouvée (et le merge)
					$AbsentiaList[$i]->addStudent($student);
				}
			}
		}
	}	
}

//Suivi
//echo('Absentia Lists :<br>');
//print_r($AbsentiaList);



//PDF

include('../../pdf.php');

if(sizeof($AbsentiaList) < 2){
	for($i = 0; $i < sizeof($AbsentiaList); $i++){
		downloadAbsentiaPDF($AbsentiaList[$i]);
	}
} else {
	dowloadAbsentiaZIP($AbsentiaList);
}


//PDF





//Pour chaque promotion
	//Décoder le label de la promotion

	//Créer une absentia list avec une liste d'étudiant vide
//	

//Préparation à la lecture du fichier

//Pour chaque ligne du fichier
	//Décoder la ligne
	//Récuperer la promotion de l'eleve (index 2)

	//Si la promotion de l'eleve est presente dans les promotions selectionné
		//Creer l'object student
		//Récuperer l'Absentia List qui a le label similaire à la promotion de l'eleve
		//Ajouter l'objet dans la liste trouvée (et le merge)
	//
//






?>