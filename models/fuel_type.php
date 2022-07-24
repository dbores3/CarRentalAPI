<?php
    
    namespace Models;
    use PDO;

    /**
     * @desc fuel_type model
     * @author David Bores 
    **/

    class Fuel_type
    {
        // Connection
        private $conn;
        // Table
        private $dbTable = "fuel_types";
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // Gets the fuel type's id from the name
        public function getFuelType($name)
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