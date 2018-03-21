<?php

require_once 'product/res/vendor/dompdf/lib/html5lib/Parser.php';
require_once 'product/res/vendor/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'product/res/vendor/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'product/res/vendor/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;

function downloadAbsentiaPDF($absentia){
	
	//Traitement du nom du fichier
	
	$filename = str_replace(' ', '_', $absentia->_class);
	$filename = strtolower($filename);
	$html = buildAbsentiaHTML($absentia);
	
	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	//$dompdf->setPaper('A4', 'portrait');
	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	//$dompdf->stream($filename);
	
	$output = $dompdf->output();
    file_put_contents('pdf/' . $filename . '.pdf', $output);

}

function dowloadAbsentiaZIP($absentias){
	
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

//downloadAbsentiaPDF($absentiaList);

?>