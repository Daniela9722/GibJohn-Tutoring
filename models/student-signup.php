<?php

    include "../core/connection.php";
    include "../models/student-signup-validation.php";
    include "../controller/student-signup-contr.php";

    if(isset($_POST["student-sign-up"])){

        //Takes the data from the registration form
        //Carry out simple validation 
        $forename = StudentValidation::clean($_POST["forename"]);
        $surname = StudentValidation::clean($_POST["surname"]);
        $dateOfBirth = StudentValidation::clean($_POST["date-of-birth"]);
        $email = StudentValidation::clean($_POST["email-address"]);
        $password = StudentValidation::clean($_POST["password"]);
        $repeatedPassword = StudentValidation::clean($_POST["repeated-password"]);

        if(empty($forename) || empty($surname) || empty($dateOfBirth) || empty($email) || empty($password) || empty($repeatedPassword)){
            $em = "*All fields should be complete";
            header("Location: ../view/sign-up-student.php?error=$em");
        }
        else if(!StudentValidation::name($forename)){
            $forenameError = "*Invalid Forename";
            header("Location: ../view/sign-up-student.php?error=$forenameError");
        }
        else if(!StudentValidation::name($surname)){
            $surnameError = "*Invalid surname";
            header("Location: ../view/sign-up-student.php?error=$surnameError");
        }
        else if(!StudentValidation::date($dateOfBirth)){
            $dateOfBirthError = "*Date of birth out of range";
            header("Location: ../view/sign-up-student.php?error=$dateOfBirthError");
        }
        else if(!StudentValidation::email($email)){
            $emailError = "*Invalid email";
            header("Location: ../view/sign-up-student.php?error=$emailError");
        }
        else if(!StudentValidation::emailExist($email)){
            $emailError = "*Email has already been registered";
            header("Location: ../view/sign-up-student.php?error=$emailError");
        }
        else if(!StudentValidation::password($password)){
            $passwordError = "*Invalid password";
            header("Location: ../view/sign-up-student.php?error=$passwordError");
        }
        else if(!StudentValidation::match($password, $repeatedPassword)){
            $matchError = "*Password and confirm password do not match";
            header("Location: ../view/sign-up-student.php?error=$matchError");
        }
        else{
            $db = new DatabaseConnection();
            $conn = $db->connect();
            $student = new StudentSignupContr($conn);
            //Hashed password
            $password = password_hash($password, PASSWORD_DEFAULT);
            $student_data = [$forename, $surname, $dateOfBirth, $email, $password];
            $res = $student->insert($student_data);
            if($res){
                header("Location: ../view/student-account.php");
            }
            else{
                $em = "An error occurred!";
                header("Location: ../view/sign-up-student.php?error=$em");
            }
        }

    }

?>