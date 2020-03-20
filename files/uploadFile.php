<?php

include("../object/files.php");


$fileHandler = new Files($databaseHandler);

//print_r($_FILES);
//die;

if(!empty($_FILES['file_to_upload'])) {

    print_r($fileHandler->uploadFile($_FILES['file_to_upload']));

} else {
    echo "Error! file_to_upload is missing!";
}


?>