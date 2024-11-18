<?php

    //Checks if the user has submitted the registration form
    if(isset($_POST['student-sign-up'])){

        //Gets data from user submitted form
        $forename = $_POST['forename'];
        $surname = $_POST['surname'];
        $dateOfBirth = $_POST['date-of-birth'];
        $email = $_POST['email-address'];
        $password = $_POST['password'];
        $repeatedPassword = $_POST['repeated-password'];
        
        //Validates the input
        include('../core/connection.php');
        include('../controller/student-signup-contr.php');
        include('../model/student-signup');
        //Creates an object from a class
        $registerStudent = new studentSignup($forename, $surname, $dateOfBirth, $emailAddress, $password, $repeatedPassword);

        //Running the error handlers and user sign up
        $registerStudent->signupStudent();

        //going to the account page
        header('location: ../view/account.php>?error=none');
    }

?>