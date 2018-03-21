<?php
foreach ($_FILES["pictures"]["error"] as $key => $error) {
	print_r($_FILES);
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
        // basename() peut empêcher les attaques "filesystem traversal";
        // une autre validation/néttoyage du nom de fichier peux être appropriée
        $name = basename($_FILES["pictures"]["name"][$key]);
        move_uploaded_file($tmp_name, "data/$name");
    }
}
?>