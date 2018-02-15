<?php

include_once('../res/includes/student.php');
include_once('function.php');
include_once('../res/includes/absentialist.php');
include_once('save.php');


say('Test.php response');
print_r($_POST);
print_r($_GET);

//Fichier à traiter dans /temp
$currentFile = $_GET['file'];
//Promotions selectionnées
$currentPromotions = $_POST['data'];
//Les Absentia List (output)
$AbsentiaList = [];


//Pour chaque promotion
for ($i = 0; $i < sizeof($promoselect); $i++){
	//Décoder les caractères speciaux
	$currentPromotions[$i] = html_entity_decode($currentPromotions[$i]);
	//Créer une absentia list avec une liste d'étudiant vide
	$AbsentiaList[$i] = new AbsentiaList($currentPromotions[$i], array());
}
//

//Préparation à la lecture du fichier
$lines = [];
$file = fopen('temp/' . $currentFile, 'r');
$text = array();
fgets($file);

//Pour chaque ligne du fichier
while (!feof($file)){
	//Décoder les lignes
	$entry = html_entity_decode(utf8_encode(fgets($file)));
	$lines[] = $entry;
	//Récuperer la promotion de l'eleve (index 2)
	$promo = $lines[1];
	
	//Si la promotion de l'eleve est presente dans les promotions selectionné
	if(exist_in_tab($promo, $currentPromotions)){
		//Creer l'object student
		$student = new Student($lines[0], $lines[1], $lines[2], $lines[3], $lines[4]);
		//Récuperer l'Absentia List qui a le label similaire à la promotion de l'eleve
		
		//Ajouter l'objet dans la liste trouvée (et le merge)
		
	}
	//
}
	









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