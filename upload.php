<?php
$target_dir = "product/exe/temp/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$error = 0;
$message = false;
echo('File type : ' . $fileType . ' / ');

/*

Errors :
0		:	aucune erreur
1		:	erreur extension
2		:	erreur de lecture
3		:	erreur de taille
4		:	fichier déjà existant
5		:	ok
6		:	ok
7		:	ok
8		:	ok
9		:	ok

*/


//Check le fichier
if (!empty(basename($_FILES["fileToUpload"]["name"]))){
	echo('file : ' . $target_file . '	/	');
	//Check l'extension

	if($fileType == 'csv'){
		echo('Good extension	/	');
	} else {
		$error = 1;
		echo('Bad extension	/	');
	}

	if ($error == 0){
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$error = 4;

			//Génération d'un nouveau nom
			$randomname = uniqid('file_');
			$randomname .= '.' . $fileType;

			echo('Move and rename to ' . $target_dir . $randomname . '	/	');

		}
		//Si erreur 4
		if ($error == 4){
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $randomname)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		
	} else {
		echo('Cant continue with error ' . $error);
	}
} else {
	echo('Bad file	/	');
}
?>