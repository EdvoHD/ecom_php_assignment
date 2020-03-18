<?php

include("../config/file_conf.php");
include("../config/database_handler.php");

class Files {

    private $database_handler;

    public function __construct($databaseHandler) {

        $this->database_handler = $databaseHandler;

    }

    private function addFileToDatabase($file_name) {

            // Lägg in sökvägen till filen i databasen.

    }

    public function uploadFile($file) {

        print_r($file);

    }


}


?>