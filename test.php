<?php

//echo('File exist ? ' . (file_exists('product/res/vendor/dompdf/src/Autoloader.php')));
require_once 'product/res/vendor/dompdf/lib/html5lib/Parser.php';
require_once 'product/res/vendor/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'product/res/vendor/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'product/res/vendor/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>
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
				   <tr>
					   <td>ADES Thomas</td>
					   <td>3h</td>
					   <td>2</td>
					   <td></td>
				   </tr>
				   <tr>
					   <td>ALLEGRET Gaelle</td>
					   <td>6h</td>
					   <td>5</td>
					   <td>Rendez-vous</td>
				   </tr>
				   <tr>
					   <td>AUBINEAU Alexandre</td>
					   <td>4h</td>
					   <td>4</td>
					   <td></td>
				   </tr>
				   <tr>
					   <td>ANCONETTI Tagride</td>
					   <td>8h</td>
					   <td>2</td>
					   <td>Rendez-vous</td>
				   </tr>
				   <tr>
				   	   <td>BASNIER Margot</td>
					   <td>1h</td>
					   <td>1</td>
					   <td></td>
				   </tr>
				   <tr>
				   	   <td>BERTRE Maud</td>
					   <td>2h</td>
					   <td>1</td>
					   <td></td>
				   </tr>
				   <tr>
				   	   <td>BODIN Maëlle</td>
					   <td>4h</td>
					   <td>3</td>
					   <td></td>
				   </tr>
				   <tr>
				   	   <td>COUSIN Antoine</td>
					   <td>3h30</td>
					   <td>2</td>
					   <td></td>
				   </tr>
				   <tr>
				   	   <td>DILARD Léo</td>
					   <td>1h30</td>
					   <td>1</td>
					   <td></td>
				   </tr>
			   </tbody>
			</table>
		</div>
		
	</div>
</body>
</html>


');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>