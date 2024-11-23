<?php

    //Creats a new class
    class ProfilePicture {
        //Creates empty variables to store database connection and student id
        private $db;
        private $studentId;

        //Takes the values sent to the class when creating a new object
        public function __construct($db, $studentId) {
            //Assigns the database connection to the above variable
            $this->db = $db;
            //Assigns the student id to the above created variable
            $this->studentId = $studentId;
        }

        // Upload/Update Profile Picture
        public function uploadProfilePicture($file) {
            // Check if file is uploaded and is an image
            if ($file['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("File upload failed.");
            }

            //Checks if the image is either in jpeg, png, or gif file format, if it isn't it will
            //thore an exception
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($file['type'], $allowedTypes)) {
                throw new Exception("Invalid file type. Only JPG, PNG, and GIF are allowed.");
            }

            // Get image data
            $imageData = file_get_contents($file['tmp_name']);

            // Update database with new profile image
            $stmt = $this->db->prepare("UPDATE students SET profileImage = :profileImage WHERE id = :id");
            //Casts image to blob data type
            $stmt->bindParam(':profileImage', $imageData, PDO::PARAM_LOB);
            //Casts data to an integer
            $stmt->bindParam(':id', $this->studentId, PDO::PARAM_INT);
            
            //Trys to execute the statement
            if ($stmt->execute()) {
                return true;
            } 
            else {
                //Trows an exception if the statement failed to execute
                throw new Exception("Failed to update profile picture.");
            }
        }

        // Delete Profile Picture
        public function deleteProfilePicture() {
            $stmt = $this->db->prepare("UPDATE students SET profileImage = NULL WHERE id = :id");
            //Casts data to an integer
            $stmt->bindParam(':id', $this->studentId, PDO::PARAM_INT);
            
            //Trys to execute the statement
            if ($stmt->execute()) {
                return true;
            } 
            else {
                //Trows an exception if the statement failed to execute
                throw new Exception("Failed to delete profile picture.");
            }
        }

        // Get Profile Picture
        public function getProfilePicture() {
            $stmt = $this->db->prepare("SELECT profileImage FROM students WHERE id = :id");
            //Casts data to an integer
            $stmt->bindParam(':id', $this->studentId, PDO::PARAM_INT);

            try {
                //Tries to execute the statement
                $stmt->execute();
                //Fetches the results to associated array
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result && !empty($result['profileImage'])) {
                    // If a profile image exists, encode it for display
                    return 'data:image/jpeg;base64,' . base64_encode($result['profileImage']);
                } 
                else {
                    //It will display a default profile image if no image is uploaded
                    return '../static/user_icon_001.jpg'; 
                }
            } catch (PDOException $e) {
                // Log the error 
                error_log("Error retrieving profile picture: " . $e->getMessage());
                // Return default image on error
                return '../static/user_icon_001.jpg'; 
            }
        }

    }
?>