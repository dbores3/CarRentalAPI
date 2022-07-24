<?php
    
    require '../../vendor/autoload.php';
    
    use Config\Database;
    use Models\Car;

    /**
     * @desc Endpoint for getting all the cars
     * @usage GET Request to <host>/<app>/api/v1/upload_file 
     * @author David Bores
    **/

    header("Access-Control-Allow-Origin: *");   
    header("Content-Type: application/json; charset=UTF-8");
    
    //Gets all the cars
    $database = new Database();
    $db = $database->getConnection();
    $items = new Car($db);
    $stmt = $items->getCars();
    $rows = $stmt->rowCount();

    if ($rows > 0) {        
        // Returns the data & number of rows
        $carArr = array();
        $carArr["body"] = array();
        $carArr["rows"] = $rows;
        // Extracts each row & pushes it into the array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            array_push($carArr["body"], $row);
        }
        // Returns the data
        echo json_encode($carArr);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "No data found.")
        );
    }
?>