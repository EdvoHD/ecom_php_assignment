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

    // Uppgift!
    // --------------
    // 1. Ladda upp filen till din $upload_folder folder.
    // 2. Spara länken i databasen.
    // 3. Returnera / Skriv ut sökvägen till filen.

    public function uploadFile($file) {

        $file_original_name     = $file['name'];
        $file_type              = $file['type'];
        $file_tmp_name          = $file['tmp_name'];
        $file_errors            = $file['error'];
        $file_size              = $file['size'];





        return $file; // Returnera sökvägen.

    }


}


?>