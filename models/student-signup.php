<?php

    //Gets the files for the database connection, validation file, and database sql queries
    include "../core/connection.php";
    include "../models/student-signup-validation.php";
    include "../controller/student-signup-contr.php";

    //Checks if the user has submitted the registration form
    if(isset($_POST["student-sign-up"])){

        //Takes the data from the registration form
        //Carry out simple validation 
        //The "StudentValidation" is the class name whilst the "clean" is the static function 
        //name. To carry out this the function
        $forename = StudentValidation::clean($_POST["forename"]);
        $surname = StudentValidation::clean($_POST["surname"]);
        $dateOfBirth = StudentValidation::clean($_POST["date-of-birth"]);
        $email = StudentValidation::clean($_POST["email-address"]);
        $password = StudentValidation::clean($_POST["password"]);
        $repeatedPassword = StudentValidation::clean($_POST["repeated-password"]);

        //Checks if any of the fields are left empty, if it returns true
        //it will display an error message to indicate that the user hasn't filled all fields
        if(empty($forename) || empty($surname) || empty($dateOfBirth) || empty($email) || empty($password) || empty($repeatedPassword)){
            $em = "*All fields should be complete";
            header("Location: ../view/sign-up-student.php?error=$em");
        }
        //If the previous statement is not executed then it will check if the forename does
        //not consist of only letters. If it returns true then it will display a usefull
        //message indicating the fault to the user
        else if(!StudentValidation::name($forename)){
            $forenameError = "*Invalid Forename";
            header("Location: ../view/sign-up-student.php?error=$forenameError");
        }
        //If the previous statement is not executed then it will check if the surname does
        //not consist of only letters. If it returns true then it will display a usefull
        //message indicating the fault to the user
        else if(!StudentValidation::name($surname)){
            $surnameError = "*Invalid surname";
            header("Location: ../view/sign-up-student.php?error=$surnameError");
        }
        //If the previous statement is not executed then it will check if the date of birth
        //is not over 2019 as they would be way to young. If it returns true then it will display a usefull
        //message indicating the fault to the user
        else if(!StudentValidation::date($dateOfBirth)){
            $dateOfBirthError = "*Date of birth out of range";
            header("Location: ../view/sign-up-student.php?error=$dateOfBirthError");
        }
        //If the previous statement is not executed then it will check if the email
        //is not in correct format. If it returns true then it will display a usefull
        //message indicating the fault to the user
        else if(!StudentValidation::email($email)){
            $emailError = "*Invalid email";
            header("Location: ../view/sign-up-student.php?error=$emailError");
        }
        //If the previous statement is not executed then it will check if the password
        //is not in correct format. If it returns true then it will display a usefull
        //message indicating the fault to the user
        else if(!StudentValidation::password($password)){
            $passwordError = "*Invalid password";
            header("Location: ../view/sign-up-student.php?error=$passwordError");
        }
        //If the previous statement is not executed then it will check if the password
        //and confirm password do not match. If it returns true then it will display a usefull
        //message indicating the fault to the user
        else if(!StudentValidation::match($password, $repeatedPassword)){
            $matchError = "*Password and confirm password do not match";
            header("Location: ../view/sign-up-student.php?error=$matchError");
        }
        //If all the previous statements are not executed then it will check if the email
        //already exist within the database. If it returns true then it will display a usefull
        //message indicating the fault to the user
        else{
            //Creates a new database execution
            $db = new DatabaseConnection();
            $conn = $db->connect();
            if($conn){
                //Creates a new object of the class and gives the connection to the class
                $emailExist = new ExistingEmail($conn);
                if(ExistingEmail::existingEmail($email)){
                    $existingEmailError = "*Email has already been registered";
                    header("Location: ../view/sign-up-student.php?error=$existingEmailError");
                }
                //If the email doesn't exist within the database it will then send the
                //data to the database table to be stored
                else{
                    //Creates a new object of the class and send the database connection to the class
                    $student = new StudentSignupContr($conn);
                    //Hashed password
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    //Stores the data that needs to be inserted within the database in a array
                    $student_data = [$forename, $surname, $dateOfBirth, $email, $password];
                    //Executes the function within the class and send the above array to it
                    $res = $student->insert($student_data);
                    //Checks if the data was stored successfully, if it returns true it will 
                    //redirect the user to the account page
                    if($res){
                        header("Location: ../view/student-account.php");
                    }
                    //If the data couldn't be inserted within the database it will display an error to the user
                    //to make them aware of it (improved UI and UX)
                    else{
                        $em = "An error occurred!";
                        header("Location: ../view/sign-up-student.php?error=$em");
                    }
                }
            }
        }

    }

?>