<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>

<form action="up.php" method="post" enctype="multipart/form-data">
<p>Images:
<input type="file" name="pictures[]" multiple/>
<input type="file" name="pictures[]" />
<input type="file" name="pictures[]" />
<input type="submit" value="Send" />
</p>
</form>

<?php
	
	include_once('../product/res/includes/absentialist.php');
include_once('../product/res/includes/student.php');
	
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



$absentiaList = new AbsentiaList('TRANSPORT ET PRESTATION LOGISTIQUE 1° ANNEE ALTERN', $students);
	
	function clearName($ab){
		$name = $ab->_class;
		
		
		if(strlen($name) > 21){
			$words = explode(' ', $name);
			$date = $ab->_date;
			$date_n = explode('/', $date);
			print_r($words);
			
			$name = ($words[0] . '_' . $words[1] . '_' . $words[2] . '_' . $date_n[1] . $date_n[2]);
		} else {
			$name = str_replace(' ', '_', $name);
			$name = strtolower($name);
		}
			
		
		return($name);
	}
	
	
	
	$temp = clearName($absentiaList);
	
	echo('<h1>Nom du fichier : (' . $temp .')</h1>');
	
	?>


</body>
</html>