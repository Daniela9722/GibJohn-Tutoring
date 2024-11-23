<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Download document for the icons-->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
 
    <!--Connects to the styles.css file-->
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <div class="side-nav">
        <div class="side-nav-user">
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
            <img src="<?php echo $imageSrc; ?>" alt="Profile Picture" class="profile-pic">
            <h4><?php echo $studentDataList["forename"];?></h4> 
        </div>
        <!--Displays the navigation option list-->
        <div class="side-nav-list">
            <a href="../view/student-account.php">Account</a>
            <a href="#">Dashboard</a>
        </div>
    </div>
</body>
</html>