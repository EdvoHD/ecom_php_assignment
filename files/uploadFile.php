<?php
include("../object/files.php");

$fileHandler = new Files($databaseHandler);

$fileHandler->uploadFile($_FILES);

?>