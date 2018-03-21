<?php

include_once('product/res/includes/absentialist.php');
include_once('product/res/includes/student.php');

$students = Array();

array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));
array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));
array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));
array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));
array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));
array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));
array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));
array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));
array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));



$absentiaList = new AbsentiaList('MDS B1', $students);

/*echo('Nom de la promo : ' . $absentiaList->_class);

$lesetudiants = $absentiaList->_students;

print_r($lesetudiants);

$student1 = $lesetudiants[0];

$nom = $student1->_name;


for($i = 0; $i < sizeof($absentiaList->_students); $i++){
	echo('
		<tr>
			' . $lesetudiants[$i]->_name . '
		</tr>
	');
}*/

include_once('pdf.php');



?>