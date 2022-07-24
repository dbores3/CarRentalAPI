<?php

    /**
     * @desc transmission model
     * @author David Bores 
    **/

    class Transmission
    {
        // Connection
        private $conn;
        // Table
        private $dbTable = "transmissions";
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // Gets the transmission's id from the name
        public function getTransmission($name)
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
            // Sanitizes the variables
            $name=htmlspecialchars(strip_tags($name));
            // Binds the data
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            // returns the id
            return $dataRow['id'];
        }        
    }