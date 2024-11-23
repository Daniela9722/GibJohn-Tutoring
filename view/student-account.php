<?php
    //Starts session
    session_start();
    //Checks if the session email and id has been set
    if(isset($_SESSION["email"]) && isset($_SESSION["id"])){

        //Includes the files
        require "../core/connection.php";
        require "../controller/profile-picture.php";
        require "../controller/student-signup-contr.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>

    <!--Download document for the icons-->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
 
    <!--Connects to the styles.css file-->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php
        include "../view/side-nav.php";
    ?>
    <div class="account-section">
        <div class="account-container">
            <h3>Profile Image</h3>  
            <div class="account-section-1">
                <div class="profile-image">
                    <?php
                        $db = new DatabaseConnection();
                        // Instantiate the ProfilePicture class separately
                        $profilePicture = new ProfilePicture($db->connect(), $_SESSION['id']);
                        $imageSrc = $profilePicture->getProfilePicture();

                        //Gets the user data for displaying
                        //Creates a new object for the class and sends a dataconnection to it
                        $studentData = new StudentSignupContr($db->connect());
                        //Executes the "getStudentData" function and send the id
                        $studentDataList = $studentData->getStudentData($_SESSION["id"]);
                    ?>
                    <!--Displays the profile image-->
                    <img src="<?php echo $imageSrc; ?>" alt="Profile Picture">
                </div>
                <div class="profile-actions">
                    <!--Enables the user to upload/update their profile image-->
                    <form action="../controller/upload-image.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="profileImage" accept="image/jpeg, image/png, image/gif" required>
                        <button type="submit" name="upload">Change Image</button>
                    </form>
                    <!--Enables the user to delete their profile image-->
                    <form action="../controller/upload-image.php" method="POST">
                        <button type="submit" name="delete">Delete Image</button>
                    </form>
                </div>
            </div>
            <!--Displays students forename, surname and email in single row-->
            <div class="account-section-2">
                <div class="account-section-2-name">
                    <h4>Profile Name</h4>
                    <span><?php echo $studentDataList["forename"];?>  <?php echo $studentDataList["surname"]; ?></span>
                </div>
                <div class="account-section-2-email">
                    <h4>Email</h4>
                    <span><?php echo $studentDataList["email"]; ?></span>
                </div>
            </div>
            <!--Displays the students date of birth and a link to change password in single row-->
            <div class="account-section-3">
                <div class="account-section-3-date">
                    <h4>Date Of Birth</h4>
                    <span><?php echo $studentDataList["dateOfBirth"]; ?></span>
                </div>
                <div class="account-section-3-pass">
                    <h4><a href="#">Change Password</a></h4>
                </div>
            </div>
            <!--Log out button form-->
            <div class="account-section-4">
                <form action="../models/log-out-student.php" method="POST">
                    <button type="submit" name="log-out" class="log-out">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    }
    //If the session variables have not been set a message will be displayed
    else{
        echo "Something Went Wrong";
    }
?>