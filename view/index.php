<?php
    //Includes the file that connects to the database
    include('C:/Users/335364/OneDrive - Milton Keynes College O365/GibJohn Tutoring/core/spec.php');
    //Includes the navigation
    require "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Name that appears on the tab-->
    <title>GibJohn Tutoring</title>
</head>
<body>

    <!--Homepage Header-->
    <header id="homepage-header">
        <!--Header text-->
        <div id="homepage-header-left">
            <h1>GibJohn Tutoring</h1>
            <p>The Best Tutoring Platform For You</p>
            <!--Link that will re-direct the user to the about us page-->
            <a href="about-us.php">Read More</a>
        </div>
        <!--Header Image-->
        <div id="homepage-header-right">
            <img src="/static/vecteezy_online-education-concept-illustration-digital-classroom_10869731.png" alt="Online Tutoring Image">
        </div>
    </header>

    <div id="attract-users">
        <span>5-star reviews</span>
        <span>1700 schools trust us</span>
        <span>275,009 students</span>
    </div>

</body>
</html>