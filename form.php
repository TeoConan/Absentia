<?php

/* RÉCUPERER LES DONNÉES DU FORMULAIRE ET L'INSCRIRE DANS UN FICHIER LOG */

$data = $_POST['data'];
echo "formulaire reçu";
print_r($data);

$file = 'log.txt';
// Ouvre un fichier pour lire un contenu existant
$current = file_get_contents($file);
// Écrit le résultat dans le fichier

$datetime = date("Y-m-d H:i:s");
$text = '[' . $datetime . ']
[NAME] = ' . $data [0] . '
[MAIL] = ' . $data[1] . '
[MESSAGE] = "' . $data[2] . '"';
		
$current .= $text;
file_put_contents($file , $current . "\r\n" . "\r\n", FILE_APPEND); 
				  
?>