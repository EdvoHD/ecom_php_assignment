<?php

include("../object/files.php");


$fileHandler = new Files($databaseHandler);

if(!empty($_FILES['file_to_upload'])) {

    echo $fileHandler->uploadFile($_FILES['file_to_upload']);

} else {
    echo "Error! file_to_upload is missing!";
}


?>