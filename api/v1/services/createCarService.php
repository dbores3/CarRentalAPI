<?php

    include_once '../../config/database.php';
    include_once '../../models/car.php';
    include_once '../../models/car_specification.php';
    include_once '../../models/location.php';
    include_once '../../models/car_brand.php';
    include_once '../../models/car_model.php';
    include_once '../../models/car_type.php';
    include_once '../../models/fuel_type.php';
    include_once '../../models/transmission.php';
    
    /**
     * @desc Create cars service
     * @author David Bores
    **/

    class createCarService
    {
        public function create_function($data)
        {
            //
            $database = new Database();
            $db = $database->getConnection();
            $car = new Car($db);
            $location = new Location($db);
            $car_brand = new Car_brand($db);
            $car_model = new Car_model($db);
            $car_type = new Car_type($db);
            $fuel_type = new Fuel_type($db);
            $transmission = new Transmission($db);
           
            //
            $car->licensePlate = $data['License plate'] ?? NULL;
            $car->km = $data['Car km'] ?? NULL;
            $car->locationID = $location->getLocation($data['Location']);
            
            $createCar = $car->create();
            if($createCar !== false){
                $car_specification = new Car_specification($db);
                //
                $car_specification->year = $data['Car year'] ?? NULL;
                $car_specification->doors = $data['Number of doors'] ?? NULL;
                $car_specification->seats = $data['Number of seats'] ?? NULL;
                $car_specification->inside_height = $data['Inside height'] ?? NULL;
                $car_specification->inside_length = $data['Inside length'] ?? NULL;
                $car_specification->inside_width = $data['Inside width'] ?? NULL;
                $car_specification->carID = $createCar;
                $car_specification->car_brandID = isset($data['Car Brand']) ? $car_brand->getCarBrand($data['Car Brand']) : NULL;
                $car_specification->car_modelID = isset($data['Car Model']) ? $car_model->getCarModel($data['Car Model']) : NULL;
                $car_specification->car_typeID = isset($data['Car Type']) ? $car_type->getCarType($data['Car Type']) : NULL;
                $car_specification->fuel_typeID = isset($data['Fuel type']) ? $fuel_type->getFuelType($data['Fuel type']) : NULL;
                $car_specification->transmissionID = isset($data['Transmission']) ? $transmission->getTransmission($data['Transmission']) : NULL;
                $car_specification->create();
                return true;
            } else{
                return false;
            }
        }
    }