<?php

    if(isset($_POST["student-sign-up"])){

        //Takes the data from the registration form
        $forename = $_POST["forename"];
        $surname = $_POST["surname"];
        $dateOfBirth = $_POST["date-of-birth"];
        $email = $_POST["email-address"];
        $password = $_POST["password"];
        $repeatedPassword = $_POST["repeated-password"];

        //Sign up the user
        include "../core/connection.php";
        include "../controller/student-signup-contr.php";
        include "../models/student-signup-validation.php";

        //Create object from the class
        $studentSignup = new StudentSignup($forename, $surname, $dateOfBirth, $email, $password, $repeatedPassword);

        //Run error hundlers
        $studentSignup->signupStudent();

        //Redirect the user to the account page
        header("location: ../view/student-account.php?error=none");

    }

?>