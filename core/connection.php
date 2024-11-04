<?php
    // Creates a class
    class connection
    {
        // Creates a method that will connect to the database
        // and check the connection
        public function __construct()
        {
            // Connects to the database
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

            // The "connection_error" method will return the error to the screen
            // and so will display a blank new page instead of showing
            // the error message at the top of the, e.g., homepage
            if($conn->connection_error)
            {
                // die() function will display a message to the screen
                // and then terminate the surrent script (same as exit() function)
                die("<h1>Database Connection Failed</h1>");
            }
            // $this is used to refer to  the current object of the class,
            // then using object operator "->" a properties or methods can be accessed
            return $this->conn = $conn;
        }
    }
?>