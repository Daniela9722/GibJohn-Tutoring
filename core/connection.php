<?php

    class DatabaseConnection{

        //Get the values that are required to connect to the database
        private $server = "localhost";
        private $username = "root";
        private $dbPassword = "";
        private $dbName = "gibjohn tutoring";
        //Variable to store the connection
        private $conn;

        //Makes connection
        public function connect(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=".$this->server. ";dbname=".$this->dbName, $this->username, $this->dbPassword);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "Connection error: ".$e->getMessage();
            }
            return $this->conn;
        }
    }

?>