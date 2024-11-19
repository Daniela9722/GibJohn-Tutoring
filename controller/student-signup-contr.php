<?php

    class StudentSignupContr{
        private $table_name;
        private $conn;

        private $studentID;
        private $forename;
        private $surname;
        private $dateOfBirth;
        private $email;
        private $password;

        function __construct($db_conn){
            $this->conn = $db_conn;
            $this->table_name = "students";
        }

        function insert($data){
            try{
                $sql = 'INSERT INTO ' . $this->table_name. '(forename, surname, dateOfBirth, email, password) VALUES(?, ?, ?, ?, ?)';
                $stmt = $this->conn->prepare($sql);
                $res = $stmt->execute($data);
                return $res;
            }
            catch(PDOException $e){
                return 0;
            }
        }

    }
?>