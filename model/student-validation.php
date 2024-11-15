<?php
    include_once('../core/spec.php');

    if(isset($_POST['student-sign-up'])){
        $forename = validateInput($db->conn, $_POST['forename']);
        $surname = validateInput($db->conn, $_POST['surname']);
        $dateOfBirth = validateInput($db->conn, $_POST['date-of-birth']);
        $emailAddress = validateInput($db->conn, $_POST['email-address']);
        $password = validateInput($db->conn, $_POST['password']);
        $rPassword = validateInput($db->conn, $_POST['re-password']);
        
        //Validates the input
        include('../controller/studentSignupContr.php');
        include('../controller/studentSignup');
        //Creates an object from a class
        $registerStudent = new studentSignupContr($forename, $surname, $dateOfBirth, $emailAddress, $password, $rPassword);

        //Running the error handlers and user sign up
        $signup->signupUser();

        //going to the account page
        header('location: ../view/account.php>?error=none');
    }