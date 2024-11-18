<?php

class StudentSignup extends StudentSignupContr{

    //Sets variable names
    private $forename;
    private $surname;
    private $dateOfBirth;
    private $email;
    private $password;
    private $repeatedPassword;

    public function __construct($forename, $surname, $dateOfBirth, $email, $password, $repeatedPassword){

        //Assigns the user inputted data to the above created variables
        $this->forename = $forename;
        $this->surname = $surname;
        $this->dateOfBirth = $dateOfBirth;
        $this->email = $email;
        $this->password = $password;
        $this->repeatedPassword = $repeatedPassword;
    }

    public function signupStudent(){
        //Create an empty list
        $errors = [];

        //Check if the user has left any field empty
        if($this->emptyInput() == false){
            $errors[] = "*All fields must be complete";
            exit();
        }

        //Checks if the user has entered a valid name
        if($this->invalidForename() == false){
            $errors[] = "*Name must consist of only letters";
        }

        //Checks if the user has entered a valid name
        if($this->invalidSurname() == false){
            $errors[] = "*Last name must consist of only letters";
        }

        //Checks if the email is valid
        if($this->invalidEmail() == false){
            $errors[] = "*Email must contain '@' and '.'";
        }

        //Checks if the email already exists
        if($this->existingEmail() == false){
            $errors[] = "*Email already exists. Please try another email.";
        }

        //Checks if the password is in a correct format
        if($this->invalidPassword() == false){
            $errors[] = "*Password must contain at least 8 characters, from which at least one is a number, special character, upper case letter, and a lower case letter";
        }

        //Checks if the passwords are the same
        if($this->passwordMatch() == false){
            $errors[] = "*Passwords do not match";
        }

        $this->signStudent($this->forename, $this->surname, $this->dateOfBirth, $this->email, $this->password);
    }

    private function emptyInput(){
        //Empty variable to store results
        $result;

        //Check if any of the input fields are empty
        if(empty($this->forename) || empty($this->surname) || empty($this->dateOfBirth) || empty($this->email) || empty($this->password) || empty($this->repeatedPassword)){
            $result = false;
        }
        else{
            $result = true;
        }

        //Returns results
        return $result;
    }

    //Validate forename
    private function invalidForename(){
        //Empty variable to store results
        $result;

        //Check if the forename consists of only letters
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->forename)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    //Validate surname
    private function invalidSurname(){
        //Empty variable to store results
        $result;

        //Check if the forename consists of only letters
        if(!preg_match("/^[a-zA-Z]*$/", $this->surname)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    //Validate email
    private function invalidEmail(){
        //Empty variable to store results
        $result;

        //Check if the email is in the correct format
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    //Checks if the email has already been registered
    private function existingEmail(){
        //Empty variable to store results
        $result;

        if(!$this->checkStudent($this->email)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    //Validate password
    private function invalidPassword(){
        //Empty variable to store results
        $result;

        //Check if the password consists of at least 8 letters, from which at least one is a number, a special character, an upper case letter and a lower case letter
        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $this->password)){
            $result = false;
        }
        else{
            $result - true;
        }

        return $result;
    }

    private function passwordMatch(){
        //Empty variable to store results
        $result;

        //Checks if password and password repeat fields are not the same
        if($this->password !== $this->repeatedPassword){
            $result = false;
        }
        else{
            $Result = true;
        }

        return $results;
    }

}

?>