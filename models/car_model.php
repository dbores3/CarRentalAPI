<?php
    
    namespace Models;
    use PDO;
    
    /**
     * @desc car_brand model
     * @author David Bores 
    **/

    class Car_model
    {
        // Connection
        private $conn;
        // Table
        private $dbTable = "car_models";
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // Gets the car model's id from the name
        public function getCarModel($name)
        {
            $sqlQuery = "
                    SELECT
                        id
                      FROM
                        ". $this->dbTable ."
                    WHERE 
                       name LIKE :name
                    ";
            $stmt = $this->conn->prepare($sqlQuery);
            //sanitizes the variables
            $name=htmlspecialchars(strip_tags($name));
            //Binds the data
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            //returns the id
            return $dataRow['id'];
        }        
    }