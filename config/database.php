<?php 
    
    namespace Config;
    use PDO;
    
    /**
     *@desc Configuration for connecting to the database
     *@author David Bores
    **/

    class Database 
    {
        private $host;
        private $database_name;
        private $username;
        private $password;
        public $conn;

        public function __construct()
        {
            // With no external library, I decided to use apache env variables
            $this->host = $_SERVER['HTTP_HOSTNAME'];
            $this->database_name = $_SERVER['HTTP_DBNAME'];
            $this->username = $_SERVER['HTTP_USERNAME'];
            $this->password = $_SERVER['HTTP_PASSWORD'];
        }

        public function getConnection()
        {
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Failed to connect to the database: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  