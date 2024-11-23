<?php
    //Checks if the user has clicked on log out button
    if(isset($_POST["log-out"])){
        //Starts session
        session_start();
        //Unsets all the session variables
        session_unset();
        //Destrys the session
        session_destroy();

        //Re-directs the user to the homepage
        header("Location: ../view/index.php");
        //Exits the if statement
        exit();
    }
?>