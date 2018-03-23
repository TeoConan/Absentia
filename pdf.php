<?php

require_once 'product/res/vendor/dompdf/lib/html5lib/Parser.php';
require_once 'product/res/vendor/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'product/res/vendor/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'product/res/vendor/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;


if(!empty($_GET['action'])){
	if($_GET['action'] == "pdf"){
		testpdf();
	}
}


function downloadAbsentiaPDF($absentia, $for='pdf'){
	
	//Traitement du nom du fichier
	
	$filename = clearName($absentia);

	$html = buildAbsentiaHTML($absentia);
	
	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	//$dompdf->setPaper('A4', 'portrait');
	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	//$dompdf->stream($filename);
	
	$output = $dompdf->output();
		$path = (getPDFPath() . $filename . '.pdf');
	if($for == 'pdf'){
		
	} else if ($for == 'zip'){
		$path = (getZIPPath() . $filename . '.pdf');
	}
	
		
	
    file_put_contents($path, $output);
	downloadFile($path);
	return($filename . '.pdf');
}

function dowloadAbsentiaZIP($absentias){
	$outputs = Array();
	$date = getdate();
	
	for($i = 0; $i < sizeof($absentias);$i++){
		$outputs[$i] = downloadAbsentiaPDF($absentias[$i]);
	}
	
	//Create zip
	$zip = new ZipArchive();
	$filename = getZIPPath() . 'AbsentiaList_' . $date['mon'] . '-' . $date['year'] . '_' . uniqid() . '.zip';

	if($zip->open($filename, ZipArchive::CREATE) === true){
		echo 'Fichier ' . $filename . ' créé	//';

		// Ajout des fichier.
		for($i = 0; $i < sizeof($absentias);$i++){
			$outputs[$i] = downloadAbsentiaPDF($absentias[$i]);
			$zip->addFile(getPDFPath() . $outputs[$i], $outputs[$i]);
		}

		// Et on referme l’archive.
		$zip->close();
		
		//Delete
		echo('<br>Ready to delete<br/>');
		print_r($outputs);
		
		for($i = 0; $i < sizeof($absentias);$i++){
			try {
				unlink(getPDFPath() . $outputs[$i]);
			} catch(Exception $e){
				
			}
			
			
			if(file_exists(getPDFPath() . $outputs[$i])){
				echo('<br>File ' . getPDFPath() . $outputs[$i] . ' always exist');
			}
		}
		
		echo('<br>	Download ' . $filename . '	');
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
		
		
		if(strlen($name) > 21){
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

function buildAbsentiaHTML($absentia){
	$css = '
	@charset "utf-8";
	/* CSS Document */

	.inner {
		background-color: antiquewhite;
		height: 1280px;
		width: 720px;
		margin: 3rem auto;
	}

	/* HEADER */

	.block-header {
		display: flex;
		justify-content: space-around;
		padding-top: 25px;
	}

	.block-header .absentia {
		display: flex;
		width: 33%;
	}
	.block-header .absentia img {
		margin: auto;
		height: 33.335433px;
		margin-left: 49px;
	}

	.block-header .espl {
		display: flex;
		width: 33%;
	}

	.block-header .espl img {
		margin: auto;
		height: 64.516535px;
	}

	.block-header .date {
		display: flex;
		width: 33%;
	}
	.block-header .date p{
		font-family: Carlito;
		font-size: 16px;
		margin: auto;
		margin-right: 49px;
	}

	/* PROMO */

	.class {
		display: flex;
		margin-top: 20px;
		margin-bottom: 20px;
	}

	.class .promotion p {
		font-family: "Century Gothic", sans-serif;
		font-size: 17.333333px;
		margin-left: 49px;
	}

	.class .nompromotion p {
		font-family: "Century Gothic", sans-serif;
		font-size: 17.333333px;
		margin-left: 55px;
	}


	/* TABLEAU */

	.table {
		font-family: Arial;
		font-size: 14.5px;
		font-style: normal;
		display: flex;
		border-bottom: 1px solid black;
		margin-left: 70px;
		margin-right: 70px;
	}

	.table table {
		margin: auto;
	}

		/* BORDER */

	table {
			border-collapse: collapse;
			margin:100px auto;
		}

		td {
			padding: 16px;
		}


		.noborders td {
			border:0;
		}

		/*---------*/

	.table table>thead {
		background-color: #cd1619;
		color: white;
		border: 0 none;

	}

	.table table>tbody>tr>td:not(:first-of-type){
		text-align: center;
	}

	.table table>tbody>tr:nth-child(odd){
		background-color: white;
	}

	.table table>tbody>tr:nth-child(even){
		background-color: #f0eff0;
	}
	';
	
	
	$innertab = '';
	$defaulthtml = '
	<!doctype html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style>
		' . $css . '
		</style>
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
					<p>19/02/18</p>
				</div>
			</div>
			<div class="class">
				<div class="promotion">
					<p>Promotion :</p>
				</div>
				<div class="nompromotion">
					<p>webmarketing et community management</p>
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
				   		'
						. $innertab .
						'
				   </tbody>
				</table>
			</div>

		</div>
	</body>
	</html>
	';
	
	return($defaulthtml);
}

function downloadFile($File){
	//echo('<br>Force download : name ' . basename($File));
	
	//header('Content-Type: application/octet-stream');
	//header('Content-Disposition: attachment; filename=' . basename($File));
	//readfile($File);
	
	//header('Location: ' . $File);
	//echo('<br exit ' . $File);
	
	echo('[REDIRECT]' . $File . '[REDIRECT]');
	
	//exit;
}

function testpdf(){
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
	
	$html = buildTest();
	
	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	$dompdf->setBasePath('product/exe/construct_pdf/');
	$dompdf->setPaper('A4', 'portrait');
	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream('test.pdf');
}

function buildTest(){
	
	return(file_get_contents("product/exe/construct_pdf/table.html"));
}



//downloadAbsentiaPDF($absentiaList);

?>


<img src="product/exe/construct_pdf/table.html"