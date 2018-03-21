<?php
	
	print_r($_FILES);
	$uploadOk = 1;
	$error = 0;
	$message = false;
	
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
	
	
//Traitement des fichiers en un seul
	print_r($_FILES);
	//SI >1 fichiers
	if (sizeof($_FILES['fileToUpload']['name']) > 0){
		
		//Chemin du fichier de merge
		//$filemerge = "product/exe/temp/" . uniqid('file_') . ".csv";
		
		
		
		//chemins des fichiers importés
		$files = [];
		
		
		
		foreach ($_FILES["fileToUpload"]["error"] as $key => $error) {
			//print_r($_FILES["fileToUpload"]);
			if ($error == UPLOAD_ERR_OK) {
				
				//Si fichier bon
			  	$fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"][$key],PATHINFO_EXTENSION));
				echo('File extension : ' . $fileType);
				
				if($fileType == 'csv'){
					//Deplacer le fichier en temporaire
					$files[] = movetoTemp($_FILES["fileToUpload"]["tmp_name"][$key]);
					
				} else {
					$error = 1;
				}
				
				
				
			}
		}
		if($error == 0){
			//Fichier de merge
			$namemerge = uniqid('file_') . ".csv";
			$filemerge = "product/exe/temp/" . $namemerge;
			echo('Filemerge : ' . $filemerge . '<br>');

			$merge = fopen($filemerge, "w");

			  foreach($files as $file){





				  $in = fopen($file, "r");
				  fgets($in);
				  while ($line = fgets($in)){
					   fwrite($merge, $line);
				  }
				  fclose($in);
				  //Suppression
				  unlink($file);
			  }

			//Then clean up

			fclose($merge);

			//Redirection

			header('Location: preview.php?file=' . $namemerge);
		} else {
			echo('<br>Stop all : ERROR ' . $error);
			header('Location: index.php?e=' . $error);
		}
	}
	
	function movetoTemp($file){
			//Chemin temp
			$tempmove = "product/exe/merge/";
			$newid = uniqid('merge_');
			$path = $tempmove . $newid . ".tmp";
			move_uploaded_file($file, $path);
			return($path);
		}
?>