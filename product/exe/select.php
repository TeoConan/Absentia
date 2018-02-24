<?php

include_once('../res/includes/student.php');
include_once('function.php');
include_once('../res/includes/absentialist.php');
//include_once('save.php');


say('Test.php response');
print_r($_POST);
print_r($_GET);

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
//

		//Suivi
		//echo('End create lists<br>');


//Préparation à la lecture du fichier
$lines = [];
$file = fopen('temp/' . $currentFile, 'r');
$text = array();

//Si le fichier excel a un header
//fgets($file);


		//Suivi
		//echo('End init file<br>');



//Pour chaque ligne du fichier
while (!feof($file)){
	//Décoder les lignes
	$entry = html_entity_decode(utf8_encode(fgets($file)));
	$lines[] = $entry;
	//Décomposer la chaine
	$read = explode(';', $entry);
	//Récuperer la promotion de l'eleve (index 2)
	$promo = $read[1];
	
			//Suivi
			//echo('Lire le fichier, ligne de l\'élève ' . $read[0] . ' dans la promotion ' . $promo . '<br>');
	
	//Si la promotion de l'eleve est presente dans les promotions selectionné
	if(exist_in_tab($promo, $selectedPromotions)){
		//Creer l'object student
		$student = new Student($read[0], $read[1], '', $read[4], '');
		
		//Récuperer l'Absentia List qui a le label similaire à la promotion de l'eleve
		$hispromo = $read[1];
		for($i = 0; $i < sizeof($AbsentiaList); $i++){
					//Suivi
					//echo('Essayer de trouver ' . $student->_name . ' dans la promotion ' . $AbsentiaList[$i]->_class . '<br>');
			
			//Si la classe de l'Absentia List est le même que celle de l'élève
			if($AbsentiaList[$i]->_class == $hispromo){
				//Ajouter l'objet dans la liste trouvée (et le merge)
				$AbsentiaList[$i]->addStudent($student);
						//Suivi
						//echo('Ajouter ' . $student->_name . ' dans la promotion ' . $AbsentiaList[$i]->_class . '<br>');
			}
		}
		
		
	}
	//
}

		//Suivi
		//echo('End select<br>');

//Suivi
echo('Absentia Lists :<br>');
print_r($AbsentiaList);









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

function say($txt){
	echo($txt . '<br>');
}






?>