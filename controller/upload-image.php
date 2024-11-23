<?php
    //Includes database connection file, and profile picture handler file
    include_once '../core/connection.php';
    include_once '../controller/profile-picture.php';

    //Starts the session so that the session variables can be accessed
    session_start();

    //Checks if the user id has not be set, if true is returned and error message will be displayed
    //to indicate that the user has not been logged in
    if (!isset($_SESSION['id'])) {
        echo "You must be logged in to upload or delete a profile picture.";
        exit;
    }

    //Stored student id within a new variable
    $studentId = $_SESSION['id'];
    //Creates a new database connection
    $db = new DatabaseConnection();
    $conn = $db->connect();

    //Checks if the connection was unsuccessful, if tru returned it will 
    //prevent the rest of the code to be executed and display an error message
    if (!$conn) {
        die("Database connection failed.");
    }

    //Creates a new object for ProfilePicture class and send database connection and stdent id to it
    $profilePic = new ProfilePicture($conn, $studentId);

    //Tries to upload an image is the upload button is clicked on
    //otherwise it will check if the "delete" button is clicked
    //if false is returned from both statement the catch statement will
    //be executed to show the error message
    try {
        if (isset($_POST['upload'])) {
            if ($_FILES['profileImage']['error'] == UPLOAD_ERR_OK) {
                //Executes the "uploadProfilePicture()" function
                $profilePic->uploadProfilePicture($_FILES['profileImage']);
                header("Location: ../view/student-account.php");
            } 
            else {
                //Dsiaplys an error if the image couldn't be uploaded
                $uploadError = "*Image Couldn't be uploaded";
                header("Location: ../view/student-account.php?error=$uploadError");
            }
        } 
        elseif (isset($_POST['delete'])) {
            //Executes the "deleteProfilePicture()" function
            $profilePic->deleteProfilePicture();
            header("Location: ../view/student-account.php");
        }
    } 
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>