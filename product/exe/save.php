<?php

include_once('../res/includes/student.php');
include_once('function.php');
include_once('../res/includes/absentialist.php');

echo('select.php						--');

if(isset($_POST)){
	if(isset($_POST['data'])){
		$promoselect = $_POST['data'];
		$namefile = 'class.csv';
		$absentialist = array();
		
		for ($i = 0; $i < sizeof($promoselect); $i++){
			//Décoder les caractères sépciaux
			$promoselect[$i] = html_entity_decode($promoselect[$i]);
			//Créer une Absentia List par promotion sélectionnée
			$absentialist[$i] = new AbsentiaList($promoselect[$i], array());
		}
		
		//print_r($promoselect);
		
		//File
		
		$file = fopen('temp/' . $namefile, 'r');
		$text = array();
		fgets($file);

		//Décoder les caractères speciaux
		while (!feof($file)){
			$lines[] = html_entity_decode(utf8_encode(fgets($file)));
		}

		$student = array();
		$temp = array();

		//Créer les objects Students
		for($i=0;$i<sizeof($lines);$i++){
			$temp = (explode(';', $lines[$i])); 
			if (!empty($temp[1])){
				$students[] = new Student($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9]);
			}
		}
		
		//print_r($students);
		
		
		
		
		//Création des Absentia List
		
		$temp = array();
		
		//Pour chaque student
		for($i=0;$i<sizeof($students);$i++){
			$current_student = $students[$i];
			
			//Ajouter les étudiants dans les Absentia List
			for($i1=0;$i1<sizeof($promoselect);$i1++){
				
				//Si correspondent à la selection
				if($current_student->_class == $promoselect[$i1]){
					$current_list = $absentialist[$i1];
					
					//echo('		List ' . $current_list->_id . ' student ' . $current_student->_name);
					$current_list->addStudent($current_student);
				}
			}
		} 
		
		echo('	/	AbsentiaList = ');
		print_r($absentialist);
	}
}













//File
/*		$file = fopen('temp/' . $namefile, 'r');
		$text = array();
		
		
		echo('	/ 	First line file = ' . fgets($file));

		while (!feof($file)){
			$lines[] = html_entity_decode(utf8_encode(fgets($file)));
		}
		
		$temp = array();

		for($i=0;$i<sizeof($lines);$i++){
			$temp = (explode(';', $lines[$i]));
			print_r($temp);
			if (!empty($temp[1])){
				if ($temp[1] == $promoselect[0]){
					//Convertir en object
					$students[] = new Student($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9]);
				}
			}	
		}
		
		$absentialist[] = new AbsentiaList($promoselect[0], $students);
		
		echo('	/	Students = ');
		print_r($students);
		
		echo('	/	AbsentiaList = ');
		print_r($absentialist);*/
















$student1 = new Student('ADES Thomas', '@ MBA2 - Alternant', 'Le 31/05 de 13h00 à 18h00', '5h00', '2', '', 'Injustifiée', 'Aucun', 'Aucun','Non');
//echo($student1->getOutput());
//print_r($student1->getArrayOutput());

/*

//Récuperer les élèves des promotions sélectionner
		for ($i = 0; $i < sizeof($listselected); $i++){
			$result = array();
			
			$students = array();
			//Changer l'encodage
			$listselected[$i] = htmlspecialchars_decode($listselected[$i]);
			
			
			$result = getOnlyPromos('class.csv', $listselected[$i]);
			//Result = les étudiants correspondant à une promotions
			echo('Length students for ' . $listselected[$i] . ' : ' . sizeof($result));
			
			for ($i1 = 0; $i1 < sizeof($result); $i1++){
				$currentstudent = $result[$i1];
				
				if ($listselected[$i] == $currentstudent[1]){
					echo('				Name = ' . $currentstudent[0] . '				');
					$students[] = new Student($currentstudent[0], $currentstudent[1], $currentstudent[2], $currentstudent[3], $currentstudent[4], $currentstudent[5], $currentstudent[6], $currentstudent[7], $currentstudent[8], $currentstudent[9]);
				}
			}
			
			
			//absentialist = les listes récapitulative Absentia
			$absentialist[] = new AbsentiaList($listselected[$i], $students);
			
			echo('-------------------------------Absentia ' . $listselected[$i]);
			print_r($absentialist);
		}

*/

?>