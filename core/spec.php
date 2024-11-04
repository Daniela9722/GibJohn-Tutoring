<?php
    // define() function defines a constant, a value that will stay the same
    // throughout the program
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "gibjohn tutoring");

    // Includes the file that connects to the database
    include_once("connection.php");
    // Assigns the database connection to a variable
    $db = new connection;
?>