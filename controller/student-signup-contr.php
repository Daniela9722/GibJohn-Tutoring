<?php

    class StudentSignupContr{
        //Set variables to store the connection and table name
        private $table_name;
        private $conn;

        //Set variables to store all the values from the table
        private $id;
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

        //Authenticates log in email and password
        function auth($email, $password){
            //Tries to execute sql statement
            try{
                //SQL statement that will nees to be executed
                //Used "?" for higher security agains SQL injections
                $sql = "SELECT * FROM " . $this->table_name . " WHERE email = ?";
                //Prepares the statements and connection
                $stmt = $this->conn->prepare($sql);
                //Replaces the "?" with the email address
                $res = $stmt->execute([$email]);
                //Checks if at least one row is returned
                if($stmt->rowCount() == 1){
                    //Returns the results as associated array
                    $user = $stmt->fetch();
                    //Assigns the extracted data values to variables
                    $db_email = $user["email"];
                    $db_password = $user["password"];
                    $db_id = $user["id"];
                    $db_forename = $user["forename"];
                    $db_surname = $user["surname"];
                    $db_date_of_birth = $user["dateOfBirth"];
                    //Checks if the user entered email matches the database extracted email
                    if($db_email === $email){
                        //Checks if the user enetered password in log in form
                        //is the same as the hashed password stored in the table
                        if(password_verify($password, $db_password)){
                            //Assigns the database extracted data to the above created variables
                            $this->email = $db_email;
                            $this->password = $db_password;
                            $this->id = $db_id;
                            $this->forename = $db_forename;
                            $this->surname = $db_surname;
                            $this->dateOfBirth = $db_date_of_birth;
                            //Returns 1 for true
                            return 1;
                        }
                        //Otherwise it will return 0
                        else{
                            return 0;
                        }
                    }
                    //Otherwise it will return 0
                    else{
                        return 0;
                    }
                }
                //Otherwise it will return 0
                else{
                    return 0;
                }
            }
            //If the sql statement couldn't be executed it will return 0
            catch(PDOException $e){
                return 0;
            }
        }

        //Places the information/data within an array
        function getStudent(){
            $data = array("id" => $this->id,
                        "forename" => $this->forename,
                        "surname" => $this->surname,
                        "dateOfBirth" => $this->dateOfBirth,
                        "email" => $this->email);
            return $data;
        }

        //Gets student data based on user id
        function getStudentData($studentId) {
            //Prepares sql statement
            $stmt = $this->conn->prepare("SELECT forename, surname, dateOfBirth, email, password FROM students WHERE id = :id");
            //Replaces ":id" with the student id
            //The "PDO::PARAM_INT" converts the data to the intiger
            $stmt->bindParam(':id', $studentId, PDO::PARAM_INT);
            //Executes the statement
            $stmt->execute();
    
            // Fetch the data as an associative array
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Check if data exists
            if ($result) {
                //Returns the data
                return $result;
            } else {
                //Gives an error if the data does not exist
                throw new Exception("User not found!");
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