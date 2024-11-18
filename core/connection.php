<?php

    class DatabaseConnection{

        protected function connection(){
            //Tries to run the code, however if it cathes an error it will display the error instead
            try{
                $username = "root";
                $password = "";
                //Using PDO provides higher level of security, and so protects from SQL injections
                //Creates a connection with the database
                $dbh = new PDO("mysql:host=localhost;dbname=gibjohn tutoring", $username, $password);
                //Returns the connection if successful
                return $dbh;
            }
            //If the connection is unsuccessful it will get the error message and then display it.
            catch(PDOException $error){
                //getMessage function takes the error that the $error variable gets
                //and the die function then kills the connection
                print "Error!: " . $error->getMessage() . "<br/>";
                die();
            }
        }
    }

?>