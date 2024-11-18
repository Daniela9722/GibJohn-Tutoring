<?php
    // Creates a class
    class DatabaseConnection
    {
        protected function connection()
        {
            try{
                //Credentials required to connect to the database
                $username = "root";
                $password = "";
                //Connect to the database
                $dbh = new PDO("mysql:host=localhost;dbname=gibjohn tutoring", $username, $password);
                //return the database connection
                return $dbh;
            }
            //An error will be displayed if the connection is unsuccessful
            //The variable "error" will store the error message and the "getMessage()" build in
            //function will take that error message
            //The die() build in function will end the code 
            catch(PDOException $error){
                print "Error!: " . $error->getMessage() . "<br/>";
                die();
            }
        }
    }
?>