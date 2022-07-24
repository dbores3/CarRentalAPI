<?php

    namespace Models;
    use PDO;
    
    /**
     * @desc car model
     * @author David Bores 
    **/
    class Car
    {
        // Connection
        private $conn;
        // Table
        private $dbTable = "cars";
        // Columns
        public $id;
        public $licensePlate;
        public $km;
        public $locationID;
        public $createdAt;
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // Gets all of the cars
        public function getCars()
        {
            $sqlQuery = "
                SELECT 
                    c.id,c.licensePlate,c.km,loc.name as location,c.createdAt
                    year,doors,seats,inside_height,inside_length,inside_width,
                    cb.name as car_brand,cm.name as car_model,ct.name as car_type,
                    ft.name as fuel_type,tr.name as transmission
                FROM " . $this->dbTable . " as c
                JOIN locations as loc ON c.locationID = loc.id
                JOIN car_specifications as cs ON c.id = cs.carID
                LEFT JOIN car_brands as cb ON cs.car_brandID = cb.id
                LEFT JOIN car_models as cm ON cs.car_modelID = cm.id
                LEFT JOIN car_types as ct ON cs.car_typeID = ct.id
                LEFT JOIN fuel_types as ft ON cs.fuel_typeID = ft.id
                LEFT JOIN transmissions as tr ON cs.transmissionID = tr.id
                WHERE c.status = 1 ";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        
        // Creates a car
        public function create()
        {   
            $sqlQuery = "INSERT INTO
                ". $this->dbTable ."
                SET
                    licensePlate = :licensePlate,
                    km = :km,
                    locationID = :locationID,
                    status = 1
                    "; 
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // Sanitizes the variables in the request
            $this->licensePlate=htmlspecialchars(strip_tags($this->licensePlate));
            $this->km=htmlspecialchars(strip_tags($this->km));
            $this->locationID=htmlspecialchars(strip_tags($this->locationID));
        
            // Binds data
            $stmt->bindParam(":licensePlate", $this->licensePlate);
            $stmt->bindParam(":km", $this->km);
            $stmt->bindParam(":locationID", $this->locationID);
            
            if($stmt->execute()){
                return $this->conn->lastInsertId();
            }
            return false;
        }
                
    }