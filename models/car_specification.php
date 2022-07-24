<?php

    namespace Models;
    use PDO;
    
    /**
     * @desc car_specification model
     * @author David Bores 
    **/

    class Car_specification
    {
        // Connection
        private $conn;
        // Table
        private $dbTable = "car_specifications";
        // Columns
        public $id;
        public $year;
        public $doors;
        public $seats;
        public $inside_height;
        public $inside_length;
        public $inside_width;
        public $carID;
        public $car_brandID;
        public $car_modelID;
        public $car_typeID;
        public $fuel_typeID;
        public $transmissionID;
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // Creates a car specification
        public function create()
        {
            $sqlQuery = "INSERT INTO
                ". $this->dbTable ."
                SET
                    year = :year,
                    doors = :doors,
                    seats = :seats,
                    inside_height = :inside_height,
                    inside_length = :inside_length,
                    inside_width = :inside_width,
                    carID = :carID,
                    car_brandID = :car_brandID,
                    car_modelID = :car_modelID,
                    car_typeID = :car_typeID,
                    fuel_typeID = :fuel_typeID,
                    transmissionID = :transmissionID";
            
            $stmt = $this->conn->prepare($sqlQuery);
        
            //sanitizes the variables in the request
            $this->year=htmlspecialchars(strip_tags($this->year));
            $this->doors=htmlspecialchars(strip_tags($this->doors));
            $this->seats=htmlspecialchars(strip_tags($this->seats));
            $this->inside_height=htmlspecialchars(strip_tags($this->inside_height));
            $this->inside_length=htmlspecialchars(strip_tags($this->inside_length));
            $this->inside_width=htmlspecialchars(strip_tags($this->inside_width));
        
            //binds data
            $stmt->bindParam(":year", $this->year);
            $stmt->bindParam(":doors", $this->doors);
            $stmt->bindParam(":seats", $this->seats);
            $stmt->bindParam(":inside_height", $this->inside_height);
            $stmt->bindParam(":inside_length", $this->inside_length);
            $stmt->bindParam(":inside_width", $this->inside_width);
            $stmt->bindParam(":carID", $this->carID);
            $stmt->bindParam(":car_brandID", $this->car_brandID);
            $stmt->bindParam(":car_modelID", $this->car_modelID);
            $stmt->bindParam(":car_typeID", $this->car_typeID);
            $stmt->bindParam(":fuel_typeID", $this->fuel_typeID);
            $stmt->bindParam(":transmissionID", $this->transmissionID);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        
    }