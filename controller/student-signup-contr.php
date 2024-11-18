<?php
    class signupStudentContr{ 

        public function checkUser($email){
            //Selects all the data where the email is the same as the entered email
        $stmt = $db->conn->prepare("SELECT * FROM registered_students WHERE email = ?");

            if(!$stmt->execute($email)){
                //Prevent the rest of the code from being executed
                $stmt = null;
                //Redirects the user to the homepage
                //Includes the message that will be displayed in the url
                header("location: ../viex/index.php?error=stmtfailed");
                exit();
            }

            //Empty variable to store results
            $resultCheck;
            //Tells how many rows where returned
            if($stmt->rowCount() > 0){
                $resultCheck = false;
            }
            else{
                $resultCheck = true;
            }

            return $resultCheck;
        }

        public function setStudent($forename, $surname, $dateOfBirth, $email, $password){
            //Selects all the data where the email is the same as the entered email
            $stmt = $db->conn->prepare("INSERT INTO regitered_students (forename, surname, dateOfBirth, email, password) VALUES (?, ?, ?, ?, ?)");
        
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            if(!$stmt->execute(array($forename, $surname, $dateOfBirth, $email, $hashedPassword))){
                $stmt = null;
                header('location: ../view/index.php?error=stmtfailed');
                exit();
            }

            //End the statement
            $stmt = null;
        }
    }

?>