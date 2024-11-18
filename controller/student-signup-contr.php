<?php

    class StudentSignupContr extends DatabaseConnection{

        protected function signStudent($forename, $surname, $dateOfBirth, $email, $password){
            //Prepare SQL statement
            $stmt = $this->connection()->prepare('INSERT INTO students (forename, surname, dateOfBirth, email, password) VALUES (?, ?, ?, ?, ?');

            //Hashes the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            //Check if the SQL statement execution fales
            if(!$stmt->execute(array($forename, $surname, $dateOfBirth, $email, $password))){
                //Close the statement
                $stmt = null;
                //Return user to the homepage
                header("location: ../view/index.php?error=stmtfailed");
                exit();
            }

            //Close the statement
            $stmt = null;

        }

        protected function checkStudent($email){
            //Takes the connection that has been creatd in "connection.php" file and then it prepares 
            //an SQL statement/code that neds to be run
            //Use "?" instead of the variable "$email" (data) as it increases the security, and protects the software from SQL injections
            $stmt = $this->connection()->prepare('SELECT email FROM students WHERE email = ?');

            //Checks if the SQL statement execution fales
            if(!$stmt->execute($email)){
                //Close the statement (deletes the statement)
                $stmt = null;
                //Returns the user to the homepage
                header("location: ../view/index.php?error=stmtfailed");
                exit();
            }

            //Empty variable to store results
            $resultCheck;
            //Counts the number of rows the statement above returned
            if($stmt->row_count() > 0){
                $resultCheck = false;
            }
            else{
                $resultCheck = true;
            }

            return $resultCheck;
        }
    }

?>