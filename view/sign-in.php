<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!--Download document for the icons-->
    <link rel="stylesheet"
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
 
    <!--Connects to the styles.css file-->
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <div id="sign-in-text">
        <h1>Sign In</h1>
    </div>
    <div id="sign-in-container">
        <div class="sign-in-choice">
            <img src="/static/rb_3291.png" alt="Student">
            <div id="sign-in-button">
                <h3> Sign In as a Student</h3>
                <a href="sign-in-student.php">Sign In</a>
            </div>
        </div>
        <div class="sign-in-choice">
            <img src="/static/rb_3272.png" alt="Tutor and Student">
            <div id="sign-in-button">
                <h3>Sign In as a Tutor</h3>
                <a href="sign-in-tutor.php">Sign In</a>
            </div>
        </div>
        <div class="sign-in-choice">
            <img src="/static/rb_1381.png" alt="Parents">
            <div id="sign-in-button">
                <h3>Sign In as a Parent</h3>
                <a href="sign-in-parent.php">Sign In</a>
            </div>
        </div>
    </div>
    <div id="back-to-home-link">
        <a class="back-to-home" href="index.php">BACK TO HOME</a>
    </div>
</body>
</html>