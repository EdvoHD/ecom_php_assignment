<?php

include("../config/file_conf.php");
include("../config/database_handler.php");

class Files {

    private $database_handler;
    private $upload_folder = "/opt/lampp/htdocs/api/uploads/";
    private $public_upload_folder = "uploads/";


    public function __construct($databaseHandler) {

        $this->database_handler = $databaseHandler;

    }

    private function addFileToDatabase($file_name) {
        $query_string = "INSERT INTO files (file_path) VALUES(:file_path_IN)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":file_path_IN", $file_name);
            $statementHandler->execute();

            $last_inserted_id = $this->database_handler->lastInsertId();

            $query_string = "SELECT file_path FROM files WHERE id=:last_id_IN";
            $statementHandler = $this->database_handler->prepare($query_string);
            $statementHandler->bindParam(":last_id_IN", $last_inserted_id);
            
            $statementHandler->execute();

            return $statementHandler->fetch()['file_path'];


        } else {
            return "ERROR";
        }
        
            // Lägg in sökvägen till filen i databasen.

    }

    // Uppgift!
    // --------------
    // 1. Ladda upp filen till din $upload_folder folder.
    // 2. Spara länken i databasen.
    // 3. Returnera / Skriv ut sökvägen till filen.

    public function uploadFile($file) {

        $returnObject = new stdClass();

        $file_original_name     = $file['name'];
        $file_type              = $file['type'];
        $file_tmp_name          = $file['tmp_name'];
        $file_errors            = $file['error'];
        $file_size              = $file['size'];

        $slizedFile = explode(".", $file_original_name);
        $uniqFileName = md5($slizedFile[0].uniqid('', true).time()) . "." . $slizedFile[1];


        $targetFile = $this->upload_folder . $uniqFileName;
        $isUploaded = move_uploaded_file($file_tmp_name, $targetFile);

        if($isUploaded) {

            $returnObject->filePath = $this->addFileToDatabase($uniqFileName);

        } else {
            $returnObject->message = "ERROR";
        }

        


        return json_encode($returnObject); // Returnera sökvägen.

    }


}


?>