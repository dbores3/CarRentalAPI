<?php
    
    include_once './services/createCarService.php';

    /**
     * @desc Endpoint for creating one new car
     * @usage POST Request to <host>/<app>/api/v1/create_single sending for example the following format {"License plate":"PJ9273542","Car km":30000,"Location":"Rønde","Car year":2022,"Number of doors":5,"Number of seats":5,"Inside height":2.5,"Inside length":3,"Inside width":2.3,"Car Brand":"Fiat","Car Model":"Panda","Car Type":"Small car","Fuel Type":"Petrol","Transmission":"Manual" }
     * @author David Bores
    **/
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // Gets the sent variables
    $data = json_decode(file_get_contents("php://input"));
    $data = (array) $data;
    
    // Creates a new car
    $car = new createCarService();

    if($car->create_function($data)){
        echo 'Car created successfully.';
    } else{
        echo 'Error while creating the car. Please try again.';
    }
?>