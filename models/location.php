<?php

    /**
     * @desc location model
     * @author David Bores 
    **/

    class Location
    {
        // Connection
        private $conn;
        // Table
        private $dbTable = "locations";
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // Gets the location's id from the name
        public function getLocation($name)
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