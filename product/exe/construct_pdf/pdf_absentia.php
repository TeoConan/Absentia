<?php

try {
	$current = $AbsentiaList;
} catch (Exception $e){
	$current = null;
}


?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	
	<style>
		img {
			height: 1.5cm;
		}
		
		td, p {
			font-family: Helvetica;
		}
		
		thead > tr > td {
			padding-bottom: 0.25cm;
			padding-top: 0.25cm;
			color: white;
		}
		h2 {
			font-family: Helvetica;
			font-weight: 400;
			font-size: 22px;
		}
		
		td {
			text-align: center;
			margin-top: 0.5cm;
			margin-bottom: 0.5cm;
			padding-top: 0.5cm;
			padding-bottom: 0.5cm;
		}
		
		table tbody tr > td:first-child {
			text-align: left;
			padding-left: 0.25cm;
		}
		
		table tbody tr:nth-child(2n) {
			background-color: #e0e0e0;
		}
		
		table, thead, tr {
			width: 19cm;
		}
		
		
		
		table {
			border:none;
			border-collapse: collapse;
		}

		table td {
		}

		table td:first-child {
			border-left: none;
		}

		table td:last-child {
			border-right: none;
		}
	</style>
</head>

<body>
	<div class="inner" style="position: relative;">
		<div class="block-header" style="display: flex; position: relative;">
			<div class="absentia" style="position: absolute; left: 0; top 0; height: auto;">
				<img src="absentia.png">
			</div>
			<div class="espl" style="display: inline-block; position: absolute; left: 6.75cm; top 0;">
				<img src="espl_campus_dark.png">
			</div>
			<div class="date" style="position: absolute; left: 17cm;">
				<p><?php echo($current->_date); ?></p>
			</div>
		</div>
		<div class="class" style="padding-top: 2cm;">
			<div class="promotion">
				<h2>Promotion : <span style="margin-left: 1cm"><?php echo($current->_class); ?></span></h2>
			</div>
		</div>
		<div class="table" style="display: block; border-collapse: collapse;">
			<table>
			   <thead style="text-align:center; border: 1px solid black; background-color: #db1820;"> <!-- En-tête du tableau -->
				   <tr>
					   <td>Étudiant</td>
						<td>Heures manqué</td>
					   <td>Alerte</td>
				   </tr>
			   </thead>

			   <tbody> <!-- Corps du tableau -->
			   
			   
				   <?php
					   for($i = 0; $i < sizeof($current->_students); $i++){
						   $current_student = $current->_students[$i];
						echo('
							<tr>
								<td>' . $current_student->_name . '</td>
								<td>' . $current_student->_hours_missed . '</td>
								<td>' . $current_student->_lesson_missed . '</td>');
						   
						if($current_student->_hours_missed >= 10 && $current_student->_hours_missed < 30){
							echo('<td>Entretien RP</td>');
						}else 
							if($current_student->_hours_missed >= 30 && $current_student->_hours_missed < 50){
							echo('<td>Conseil</td>');
						}else 
							if($current_student->_hours_missed >= 50 && $current_student->_hours_missed < 60){
							echo('<td>Exclusion à 60h</td>');
						}else 
							if($current_student->_hours_missed >= 60){
							echo('<td>Exclusion</td>');
						}else{
							echo('<td></td>');
						}
							echo('</tr>');  
					   }
				   
				  ?>
			   </tbody>
			</table>
		</div>
		
	</div>
</body>
</html>
