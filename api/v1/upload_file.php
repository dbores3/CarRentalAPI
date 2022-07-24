<?php
    
    include_once './services/files/FileFactory.php';

    /**
     * @desc Endpoint for processing files & creating the cars within
     * @usage POST Request to <host>/<app>/api/v1/upload_file sending a form-data with key => file, value => file to upload
     * @author David Bores
    **/

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // Gets the file's extension
    $file = $_FILES['file'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    
    // Uploads the file
    try {
        // Sends the extension & reads the file
        $fileFactory = FileFactory::get($ext);
        $fileFactory->read();	
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
    if(isset($fileFactory)){
        echo 'Cars created successfully.';
    } else{
        echo 'Error while creating the car. Please check your format & try again.';
    }
?>