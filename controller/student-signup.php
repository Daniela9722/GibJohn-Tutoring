<?php

    class studentSignup extends connection{

        private $forename;
        private $surname;
        private $dateOfBirth;
        private $email;
        private $password;
        private $repeatedPassword;

        //These variable are the variables that contain
        //the user input values from student-validation.php
        public function __construct($forename, $surname, $dateOfBirth, $email, $password, $repeatedPassword){
            $this->forename = $forename;
            $this->surname = $surname;
            $this->dateOfBirth = $dateOfBirth;
            $this->email = $email;
            $this->password = $password;
            $this->repeatedPassword = $repeatedPassword;
        }

        //checks for any errors
        public function signupStudent(){
            //Empty array to store error messages
            $errors = [];

            //Checks if any input fields where empty
            if($this->emptyInput() == false){
                //Add error message
                $errors[] = "*All input fields must be filled";
                exit();
            }

            //Checks if the name is correct
            if($this->invalidForename() == false){
                //Add error message
                $errors[] = "*Forename must contain only letters";
                exit();
            }

            //Check if the last name is correct
            if($this->invalidSurname() == false){
                //Add error message
                $errors[] = "*Surname must contain only letters";
                exit();
            }

            //Check if the email is coorect format
            if($this->invalidEmail() == false){
                //Add error message
                $errors[] = "*Email is not in the correct form";
                exit();
            }

            //Check if the email does not exist
            if($this->existingEmail() == false){
                //Add error message
                $errors[] = "*Email is already registered";
                exit();
            }

            //Check if the password is correct
            if($this->invalidPassword() == false){
                //Add error message
                $errors[] = "*Password must contain at least 8 characters, from which at leqast one is upper case letter, lower case letter, special character and number";
                exit();
            }

            //Check if the passwords match
            if($this->passwordMatch() == false){
                //Add error message
                $errors[] = "*Passwords do not match";
                exit();
            }

            //To store the data within the database if no errors have been cought
            $this->setStudent($this->forename, $this->surname, $this->dateOfBirth, $this->email, $this->password);

        }

        //Checks if any of the inputs are empty
        private function emptyInput(){
            //Empty variable that will store true or false based on results
            $results;

            //Uses php build in function to check if any of the properties are empty
            // "||" means "OR"
            if(empty($this->forename) || empty($this->surname) || empty($this->dateOfBirth) || empty($this->email) || empty($this->password) || empty($this->repeatedPassword)){
                //Assigns a value for a variable
                $results = false;
            }
            else{
                //Assigns a value for a variable
                $results = true;
            }
            //Returns the value
            return $results;
        }

        private function invalidForename(){
            //Sets variables to store results
            $results;

            //Check the first and last name
            //Ensures that it only contains letters
            $pattern = "/^[a-zA-Z]+$/";

            //Checks if the name does not match the pattern OR if it is empty
            if(!preg_match($pattern, $this->forename)) {
                //Stores the error message
                $results = false;
            }
            else{
                $results = true;
            }

            return $results;
        }

        private function invalidSurname(){
            //Empty variable to store results
            $results;

            //Check the first and last name
            //Ensures that it only contains letters
            $pattern = "/^[a-zA-Z]+$/";

            //Checks if the name does not match the pattern OR if it is empty
            if(!preg_match($pattern, $this->surname)) {
                //Stores the error message
                $results = false;
            }
            else{
                $results = true;
            }

            return $results;
        }

        private function invalidEmail(){
            //Empty variable to store results
            $results;

            //Checks if the email is in the correct format
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $results = false;
            }
            else{
                $results = true;
            }

            return $results;
        }

        private function existingEmail(){
            //Empty variable to store results
            $results;

            //Checks if the email has already been registered
            if(!$this->checkUser($this->$email)){
                $results = false;
            }
            else{
                $results = true;
            }
            return $results;
        }


        private function invalidPassword(){
            //Create an empty variable to store error message 
            $results; 

            //Checks if the password is at least 8 characters long,
            //containing at least one upper case letter, one lower case letter
            //one number, and one special symbol
            $pass_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
            if(!preg_match($pass_pattern, $password)){
                $results = false;
            }
            else{
                $results = true;
            }
            return $results;
        }

        private function passwordMatch(){
            //Create an empty variable to store error message
            $results;

            //Checks if both passwords match each other
            if($this->password !== $this->repeatedPassword){
                $results = false;
            }
            else{
                $results = true;
            }
            
            return $results;
        }

    }

?>