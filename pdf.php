<?php

require_once 'product/res/vendor/dompdf/lib/html5lib/Parser.php';
require_once 'product/res/vendor/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'product/res/vendor/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'product/res/vendor/dompdf/src/Autoloader.php';
require_once 'product/exe/function.php';
Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;


if(!empty($_GET['action'])){
	if($_GET['action'] == "pdf"){
		testpdf();
	}
	
	if($_GET['action'] == "print"){
		//buildAbsentiaHTML();
	}
}


function downloadAbsentiaPDF($absentia, $for='pdf', $dl = true){
	
	//Traitement du nom du fichier
	$filename = clearName($absentia) . '_' . uniqid();
	$path = (getPDFPath() . $filename . '.pdf');
	$html = buildAbsentiaHTML($absentia);
	//echo($html);
	
	//Construction du pdf
	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	$dompdf->setBasePath('construct_pdf/');
	$dompdf->setPaper('A4', 'portrait');
	$dompdf->render();
	
	//Error case
	$f;
	$l;
	if(headers_sent($f,$l))
	{
		echo $f,'<br/>',$l,'<br/>';
		die('now detect line');
	}
	
	//Sortie du pdf
	$output = $dompdf->output();
	$path = (getPDFPath() . $filename . '.pdf');
	if($for == 'pdf'){
		
	} else if ($for == 'zip'){
		$path = (getZIPPath() . $filename . '.pdf');
	}

	//Ecriture du fichier
    file_put_contents($path, $output);
	if($dl){downloadFile($path);/*echo('	//Download file ' . $path . '//		');*/}
	return($filename . '.pdf');
}

function dowloadAbsentiaZIP($absentias){
	$outputs = Array();
	$date = getdate();
	
	for($i = 0; $i < sizeof($absentias);$i++){
		$outputs[$i] = downloadAbsentiaPDF($absentias[$i], 'zip', false);
	}
	
	//Create zip
	$zip = new ZipArchive();
	$filename = getZIPPath() . 'AbsentiaList_' . $date['mon'] . '-' . $date['year'] . '_' . uniqid() . '.zip';

	if($zip->open($filename, ZipArchive::CREATE) === true){
		//echo 'Fichier ' . $filename . ' créé	//';

		// Ajout des fichier.
		for($i = 0; $i < sizeof($absentias);$i++){
			$outputs[$i] = downloadAbsentiaPDF($absentias[$i], 'zip', false);
			$zip->addFile(getZIPPath() . $outputs[$i], $outputs[$i]);
		}

		// Et on referme l’archive.
		$zip->close();
		
		//Delete
		//echo('<br>Ready to delete<br/>');
		print_r($outputs);
		
		for($i = 0; $i < sizeof($absentias);$i++){
			try {
				unlink(getZIPPath() . $outputs[$i]);
			} catch(Exception $e){
				
			}
			
			
			if(file_exists(getZIPPath() . $outputs[$i])){
				//echo('<br>File ' . getPDFPath() . $outputs[$i] . ' always exist');
			}
		}
		
		//echo('<br>	Download ' . $filename . '	');
		downloadFile($filename);
		
	} else {
		echo 'Error ZIP : ' . $filename;
		// Traitement des erreurs avec un switch(), par exemple.
	}

}

function getPDFRootPath(){
	return('product/exe/pdf');
}

function getPDFPath(){
	return('pdf/');
}

function getZIPPath(){
	return('zip/');
}

function clearName($ab){
		$name = strtolower($ab->_class);
		
		
		if(strlen($name) > 50){
			$words = explode(' ', $name);
			$date = $ab->_date;
			$date_n = explode('/', $date);
			
			
			$name = ($words[0] . '_' . $words[1] . '[...]' . $words[sizeof($words)-1] . '_' . $date_n[1] . '-' . $date_n[2]);
			
			if (file_exists(getPDFPath() . $name . '.pdf')){
				
			}
		} else {
			$name = str_replace(' ', '_', $name);
			$name = strtolower($name);
		}
			
		
		return($name);
	}

function downloadFile($File){
	//echo('<br>Force download : name ' . basename($File));
	
	//header('Content-Type: application/octet-stream');
	//header('Content-Disposition: attachment; filename=' . basename($File));
	//readfile($File);
	
	//header('Location: ' . $File);
	//echo('<br exit ' . $File);
	
	echo('<redirect>' . $File . '</redirect>');
	launchCleaning();
	
	//exit;
}

function testpdf(){
	include_once('product/res/includes/absentialist.php');
	include_once('product/res/includes/student.php');

	$students = Array();

	array_push($students ,new Student('Lauera Blondeau', 'MDS B1', '', 158, 1));
	array_push($students ,new Student('Laugrra Blondeau', 'MDS B1', '', 1588, 1));
	array_push($students ,new Student('Laurgra Bloretrgendeau', 'MDS B1', '', 18, 1));
	array_push($students ,new Student('Laura Blrgegeondeau', 'MDS B1', '', 1857, 1));
	array_push($students ,new Student('Largergeura Blondeau', 'MDS B1', '', 18, 1));
	array_push($students ,new Student('Laura grBlondeau', 'MDS B1', '', 128, 1));
	array_push($students ,new Student('Laurggea Blondeau', 'MDS B1', '', 148, 1));
	array_push($students ,new Student('Laura greBlondeau', 'MDS B1', '', 18, 1));
	array_push($students ,new Student('Lauragg Blondeau', 'MDS B1', '', 18, 1));



	$absentiaList = new AbsentiaList('MDS B1', $students);
	
	$html = buildAbsentiaHTML($absentiaList);
	//echo($html);
	
	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	$dompdf->setBasePath('product/exe/construct_pdf/');
	$dompdf->setPaper('A4', 'portrait');
	$dompdf->render();
	
	$f;
	$l;
	if(headers_sent($f,$l))
	{
		echo $f,'<br/>',$l,'<br/>';
		die('now detect line');
	}
	$dompdf->stream('test.pdf');
}

function buildAbsentiaHTML($AbsentiaList){
	$msgerror = "";
	$error = false;
	$outputhtml = "";
	$count = 0;
	//$css = file_get_contents("product/exe/construct_pdf/css.html");
	
	$dynamictable = "";
	
	$tabstudent = $AbsentiaList->_students;
	for($i = 0; $i < sizeof($tabstudent); $i++){
		$current = $tabstudent[$i];
		$alert = "";
		$count++;
		if($current->_hours_missed >= 8){
		
			if($current->_hours_missed >= 10 && $current->_hours_missed < 30){
				$alert = ('Entretien RP');
			}else 
				if($current->_hours_missed >= 30 && $current->_hours_missed < 50){
				$alert = ('Conseil');
			}else 
				if($current->_hours_missed >= 50 && $current->_hours_missed < 60){
				$alert = ('Exclusion à 60h');
			}else 
				if($current->_hours_missed >= 60){
				$alert = ('Exclusion');
			}else{
				$alert = ('');
			}

			
			$dynamictable .= '
						<tr>
						   <td>' . $current->_name . '</td>
							<td>' . $current->_hours_missed . '</td>
						   <td>' . $alert . '</td>
					   </tr>
			';
		}
		
		//Detect errors
		if($current->_name == "" || $current->_hours_missed== ""){
			//$error = true;
			$msgerror .= "<p>Error 1</p>";
		}
	}
	
	if($count < sizeof($tabstudent) || sizeof($tabstudent) == 0){$error = true;$msgerror .= "<p>Error 2</p>";}
	
	if($error){
		$msgerror .= "<p>Une erreur est survenue lors de la lecture du document, les résultats peuvent être erronés.<br>Count : " . $count . "<br>Error : " . $error . "<br>Size : " . sizeof($tabstudent) . "</p>";
	}
	
	$outputhtml = '
	
	<!doctype html>
	<html>

	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" type="image/png" href="logo.ico" />
	<link rel="stylesheet" href="tablee.css" />
	
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
	<title>Absentia - ' . $AbsentiaList->_class . '</title>
	<link rel="icon" type="image/png" href="logo.ico" />
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
				<p>' . $AbsentiaList->_date . '</p>
			</div>
		</div>
		<div class="class" style="padding-top: 2cm;">
			<div class="promotion">
				<h2>Promotion : <span style="margin-left: 1cm">' . $AbsentiaList->_class . '</span></h2>
			</div>
		</div>
		<div class="table" style="display: block; border-collapse: collapse;">
			<table>
			   <thead style="text-align:center; border: 1px solid black; background-color: #db1820;"> <!-- En-tête du tableau -->
				   <tr>
					   <td>Étudiant</td>
						<td>Heures manquées</td>
					   <td>Alerte</td>
				   </tr>
			   </thead>

			   <tbody> <!-- Corps du tableau -->
				   ' . $dynamictable . '
			   </tbody>
			</table>
			' . $msgerror . '
		</div>
	</div>
</body>
</html>';
		
	return($outputhtml);
}

?>