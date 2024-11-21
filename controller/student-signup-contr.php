<?php

    class StudentSignupContr{
        //Set variables to store the connection and table name
        private $table_name;
        private $conn;

        //Set variables to store all the values from the table
        private $studentID;
        private $forename;
        private $surname;
        private $dateOfBirth;
        private $email;
        private $password;

        //"__construct" function initilise the object's properties upon creating the object
        function __construct($db_conn){
            //Tkes the variable created above and stores the database connection 
            $this->conn = $db_conn;
            //Stores the database table name from the variable above
            $this->table_name = "students";
        }

        //Function to add student data to the table
        function insert($data){
            //It will first try to insert the data and then if it doesn't work it will get
            //the error and return 0, which means that the error should not be displayed
            try{
                //Establishes the SQL statement that will need to be carried out
                //"$this->table_name" will take the above established table name 
                //The question marks are used instead of the data variables for increased security
                //especially agains sql injections
                $sql = 'INSERT INTO ' . $this->table_name. '(forename, surname, dateOfBirth, email, password) VALUES(?, ?, ?, ?, ?)';
                //Takes the established connection and prepares the above statement
                $stmt = $this->conn->prepare($sql);
                $res = $stmt->execute($data);
                return $res;
            }
            catch(PDOException $e){
                return 0;
            }
        }

    }

    class ExistingEmail{

        //Creates an empty variable to store database connection
        //To access the variable latter a static variable needs to be created
        private static $conn;

        //"__construct" function initilise the object's properties upon creating the object
        function __construct($db_conn){
            //Tkes the variable created above and stores the database connection 
            //Use "self::" to access the static variable
            self::$conn = $db_conn;
        }

        //Checks if the email is alreadt registered
        static function existingEmail($str){
            //Creates an SQL statement
            //It uses "?" for increased security, especially against SQL injections
            $sql = "SELECT COUNT(*) FROM students WHERE email = ?";
            //Uses "self::" to access the variable used to store connection and 
            //prepares the statement for execution
            $stmt = self::$conn->prepare($sql);
            //Executes the statement and inserts the email in the position of the "?"
            $stmt->execute([$str]);
            //Fethes the returned columns
            $rows = $stmt->fetchColumn();
    
            //Checks if the number of rows returned is over 0 (which means that the email has 
            //already been registered) and then it will return true, otherwise it will return false
            if($rows > 0){
                return true;
            }
            else{
                return false;
            }
            
        }
    }
?>