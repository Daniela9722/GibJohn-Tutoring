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

    <div>
        <div>
            <!--Uses post method to send user input to the php file more securely
            since the input will not appear on the search bar-->
            <form action="#" method="post">
                <!--Input field for forename-->
                <div>
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="forename">Forename</label>
                    <input type="text" id="forename" name="forename">
                </div>
                <!--Input field for surname-->
                <div>
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="surname">Surname</label>
                    <input type="text" id="surname" name="surname">
                </div>
                <!--Input field for date of birth-->
                <div>
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="date-of-birth">Date of Birth</label>
                    <input type="date" id="date-of-birth" name="date of birth">
                </div>
                <!--Input field for email address-->
                <div>
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="email-address">Email Address</label>
                    <input type="email" id="email-address" name="email adress">
                </div>
                <!--Input field for password-->
                <div>
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="password">Password</label>
                    <input type="password" id="passwword" name="password">
                </div>
                <!--Input field for re-entering password-->
                <div>
                    <!--Adds a label for the input field for accessibility (when using screen readers)-->
                    <label for="re-password">Re-enter Password</label>
                    <input type="password" id="re-password" name="repeated password">
                </div>
            </form>
        </div>
    <div>

</body>
</html>