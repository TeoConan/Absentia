<?php

//echo('File exist ? ' . (file_exists('product/res/vendor/dompdf/src/Autoloader.php')));
require_once '../product/res/vendor/dompdf/lib/html5lib/Parser.php';
require_once '../product/res/vendor/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once '../product/res/vendor/dompdf/lib/php-svg-lib/src/autoload.php';
require_once '../product/res/vendor/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$dompdf->setBasePath('../');
$dompdf->loadHtml('<h1 style="color: red;">Hey</h1>');



// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>