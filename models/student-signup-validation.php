<?php

class StudentValidation{

    static function clean($str){
        $str = trim($str);
        $str = stripcslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    //Validates forename and surname
    static function name($str){
        //Checks if the name consists of only letters
        $pattern = "/^[a-zA-Z]+$/";
        if(preg_match($pattern, $str)){
            //Checks if the name is at least 2 characters long
            if(strlen($str) >= 2){
                return true;
            }
        }
        else{
            return false;
        }
    }

    //Validates date of birth
    static function date($str){
        //Turn the received date to a date data type 
        $str = date_create($str);
        //Formats the entered date
        $date = date_format($str, "d/m/Y");
        //Cast the formated date to a date data type
        $date = date_create($date);
        $currentYear = date('Y');
        $maxYear = 2019;

        //Checks if the student is of the minimum age
        if($date->format('Y') <= 2019){
            return true;
        }
        else{
            return false;
        }
       
    }

    //Validates email format
    static function email($str){
        //Checks if the email is in correct format (conatins "@" and ".")
        if(filter_var($str, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            return false;
        }
    }

    //Checks if the email is already within the database
    static function emailExist($str){

        //Create a new object to make a connection with database
        $db = new DatabaseConnection();
        $conn = $db->connect();

        //Prepares the statement
        $sql = "SELECT email FROM students WHERE email = ?";
        $stmt = $conn->prepare($sql);
        //Executed the statement
        $stmt->execute($str);

        //Checks if it has returned more than 0 rows
        if($stmt->rowCount() === 0){
            return true;
        }
        else{
            return false;
        }
    }

    //Validates Password
    static function password($str){
        //Checks if the password consists of at least 8 characters from which at least
        //one is a number, a speacial character, upper case letter, and a lower case letter
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        if(preg_match($pattern, $str)){
            return true;
        }
        else{
            return false;
        }
    }

    //Checks if the password and confirm password match
    static function match($str1, $str2){
        //Checks if the password and confirm password match
        if($str1 === $str2){
            return true;
        }
        else{
            return false;
        }
    }

}

?>