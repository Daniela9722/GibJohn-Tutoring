<?php
    include('../core/spec.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!--Download document for the icons-->
    <link rel="stylesheet"
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
 
    <!--Connects to the styles.css file-->
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <!--Title for the page-->
    <div id="sign-up-text">
        <h1>Sign Up</h1>
    </div>
    <!--Add the choice to sign up as a student, tutor or parent-->
    <div id="sign-up-container">
        <div class="sign-up-choice">
            <img src="/static/rb_3291.png" alt="Student">
            <div id="sign-up-button">
                <h3> Sign Up as a Student</h3>
                <a href="sign-up-student.php">Sign Up</a>
            </div>
        </div>
        <div class="sign-up-choice">
            <img src="/static/rb_3272.png" alt="Tutor and Student">
            <div id="sign-up-button">
                <h3>Sign Up as a Tutor</h3>
                <a href="sign-up-tutor.php">Sign Up</a>
            </div>
        </div>
        <div class="sign-up-choice">
            <img src="/static/rb_1381.png" alt="Parents">
            <div id="sign-up-button">
                <h3>Sign Up as a Parent</h3>
                <a href="sign-up-parent.php">Sign Up</a>
            </div>
        </div>
    </div>
    <!--Link to back to home that will send the user to the homepage-->
    <div id="back-to-home-link">
        <a class="back-to-home" href="index.php">BACK TO HOME</a>
    </div>
</body>
</html>