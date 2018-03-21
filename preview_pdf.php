<?php
	include('product/res/includes/absentialist.php');
	include('product/res/includes/student.php');

	$students = Array();

	array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 9, 1));
	array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 18, 1));
	array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 60, 1));
	array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 28, 1));
	array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 85, 1));
	array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 1, 1));
	array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 14, 1));
	array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 10, 1));
	array_push($students ,new Student('Laura Blondeau', 'MDS B1', '', 30, 1));



	$absentiaList = new AbsentiaList('MDS B1', $students);

?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/table.css" />
	<title>Absentia - Table</title>
	<link rel="icon" type="image/png" href="res/icons/logo.ico" />
</head>

<body>
	<div class="inner">
		<div class="block-header">
			<div class="absentia">
				<img src="img/absentia.png">
			</div>
			<div class="espl">
				<img src="img/Logo ESPL Campus V2 noir.png">
			</div>
			<div class="date">
				<p><?php echo($absentiaList->_date); ?></p>
			</div>
		</div>
		<div class="class">
			<div class="promotion">
				<p>Promotion :</p>
			</div>
			<div class="nompromotion">
				<p><?php echo($absentiaList->_class); ?></p>
			</div>
		</div> 
		<div class="table">
			<table>
			   <thead style="text-align:center"> <!-- En-tête du tableau -->
				   <tr>
					   <td>Étudiant</td>
					   <td>Heures manquées</td>
					   <td>Cours manqués</td>
					   <td>Alerte</td>
				   </tr>
			   </thead>

			   <tbody> <!-- Corps du tableau -->
				  <?php
				   for($i = 0; $i < sizeof($absentiaList->_students); $i++){
					   $current_student = $absentiaList->_students[$i];
    			   	echo('
        				<tr>
							<td>' . $current_student->_name . '</td>
							<td>' . $current_student->_hours_missed . '</td>
							<td>' . $current_student->_lesson_missed . '</td>');
					if($current_student->_hours_missed>=10 && $current_student->_hours_missed<30){
						echo('<td>Entretien</td>');
					}else if($current_student->_hours_missed>=30){
					 	echo('<td>Conseil</td>');
					}else{
						echo('<td></td>');
					}
						echo('</tr>');  
				   }
				   
					   
				  	/*<tr>
					   <td>ADES Thomas</td>
					   <td>3h</td>
					   <td>2</td>
					   <td></td>
				   	</tr>*/
				  ?>
			   </tbody>
			</table>
		</div>
		
	</div>
</body>
</html>
