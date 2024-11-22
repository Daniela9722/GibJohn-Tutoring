<?php
    session_start();
    //Gets the files for the database connection, validation file, and database sql queries
    include "../core/connection.php";
    include "../models/student-signup-validation.php";
    include "../controller/student-signup-contr.php";

    //Checks if the user has submitted the registration form
    if(isset($_POST["student-sign-in"])){

        //Takes the data from the registration form
        //Carry out simple validation 
        //The "StudentValidation" is the class name whilst the "clean" is the static function 
        //name. To carry out this the function
        $email = StudentValidation::clean($_POST["email-address"]);
        $password = StudentValidation::clean($_POST["password"]);

        //Checks if any of the fields are left empty, if it returns true
        //it will display an error message to indicate that the user hasn't filled all fields
        if(empty($email) || empty($password)){
            $em = "*All fields should be complete";
            header("Location: ../view/sign-in-student.php?error=$em");
        }
        //If the previous statement is not executed then it will check if the email
        //is not in correct format. If it returns true then it will display a usefull
        //message indicating the fault to the user
        else if(!StudentValidation::email($email)){
            $emailError = "*Invalid email";
            header("Location: ../view/sign-in-student.php?error=$emailError");
        }
        //If the previous statement is not executed then it will check if the password
        //is not in correct format. If it returns true then it will display a usefull
        //message indicating the fault to the user
        else if(!StudentValidation::password($password)){
            $passwordError = "*Invalid password";
            header("Location: ../view/sign-in-student.php?error=$passwordError");
        }
        else{
            //Creates a new database execution
            $db = new DatabaseConnection();
            $conn = $db->connect();
            $user = new StudentSignupContr($conn);
            $auth = $user->auth($email, $password);
            if($auth){
                $studentData = $user->getStudent();
                $_SESSION["email"] = $studentData["email"];
                $_SESSION["id"] = $studentData["id"];
                header("Location: ../view/student-account.php");
            }
            else{
                $em = "*Incorrect email or password";
                header("Location: ../view/sign-in-student.php?error=$em");
            }
        }

    }
?>