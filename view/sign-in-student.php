<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign In</title>

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
            <h1>Student Sign In</h1>
            <!--Uses post method to send user input to the php file more securely
            since the input will not appear on the search bar-->
            <form class="sign-input-fields" action="#" method="post">

                <!--Option to sign up with google-->
                <button class="sign-google" style="submit">Sign In with Google</button>
                <h2 class="line-with-text"><span>OR</span></h2>

                <!--Input field for email address-->
                <div class="input-field">
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="email-address">Email Address</label>
                    <input type="email" id="email-address" name="email adress">
                </div>

                <!--Input field for password-->
                <div class="input-field">
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="password">Password</label>
                    <input type="password" id="passwword" name="password">
                </div>

                <button class="sign-in-button" type="submit" name="sign-in">Sign In</button>
                <p class="dont-have-an-account">Don't have an account? <a class="sign-link-redirect" href="sign-up-student.php">Sign Up</a></p>
            </form>

            <!--Link to back to home that will send the user to the homepage-->
            <div>
                <a class="back-to-home" href="index.php">BACK TO HOME</a>
            </div>
        </div>

        <!--Image-->
        <div class="sign-image">
            <img src="/static/9963629.jpg" alt="Student sitting at the desk">
        </div>
    </div>
</body>
</html>