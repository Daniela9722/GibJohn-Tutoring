<?php
    include('../core/spec.php');
    include_once("../model/student-validation.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up</title>

    <!--Download document for the icons-->
    <link rel="stylesheet"
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
 
    <!--Connects to the styles.css file-->
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>

    <div class="sign-container">
        <div class="sign-form">
            <div>
                <a href="index.php"><img class="sign-logo" src="/static/202129597-removebg-preview.png" alt="Logo"></a>
            </div>
            <h1>Student Sign Up</h1>
            <!--Uses post method to send user input to the php file more securely
            since the input will not appear on the search bar-->
            <form class="sign-input-fields" action="#" method="post">

                <!--Option to sign up with google-->
                <button class="sign-google" style="submit">Sign Up with Google</button>
                <h2 class="line-with-text"><span>OR</span></h2>

                <!--Input field for forename-->
                <div class="input-field">
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="forename">Forename</label>
                    <input type="text" id="forename" name="forename">
                </div>

                <!--Input field for surname-->
                <div class="input-field">
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="surname">Surname</label>
                    <input type="text" id="surname" name="surname">
                </div>

                <!--Input field for date of birth-->
                <div class="input-field">
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="date-of-birth">Date of Birth</label>
                    <input type="date" id="date-of-birth" name="date-of-birth">
                </div>

                <!--Input field for email address-->
                <div class="input-field">
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="email-address">Email Address</label>
                    <input type="email" id="email-address" name="email-adress">
                </div>

                <!--Input field for password-->
                <div class="input-field">
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="password">Password</label>
                    <input type="password" id="passwword" name="password">
                </div>

                <!--Input field for re-entering password-->
                <div class="input-field">
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="re-password">Re-enter Password</label>
                    <input type="password" id="re-password" name="repeated-password">
                </div>

                <!--Button to submit the inputed data-->
                <button class="sign-up-button" type="submit" name="student-sign-up">Sign Up</button>
                <!--Enables the user to go to the sign in page if they have an account, therefore improving UX-->
                <p class="have-an-account">Have an account: <a class="sign-link-redirect" href="sign-in-student.php">Sign In</a></p>

            </form>
            <!--Link to back to home that will send the user to the homepage-->
            <div>
                <a class="back-to-home" href="index.php">BACK TO HOME</a>
            </div>
        </div>
        <!--Image-->
        <div class="sign-image">
            <img src="/static/8899746.jpg" alt="Student Reading a Book">
        </div>
    </div>

</body>
</html>