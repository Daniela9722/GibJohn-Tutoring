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

    <div id="what-we-offer">
        <div id="what-we-offer-img">
            <img id="benefit-image-1" src="/static/online-science-tutoring-abstract-concept-illustration-personalised-learning-online-educational-platform-homeschooling.png" alt="Online science class">
            <img id="benefit-image-2" src="/static/rb_40416.png" alt="Person with certificate">
            <img id="benefit-image-3" src="/static/rb_1357.png" alt="Trusted by parents">
            <img id="benefit-image-4" src="/static/rb_2149247168.png" alt="Gamification">
        </div>

        <div id="what-we-offer-text">
            <div id="what-we-offer-top">
                <div class="benefit-1" tabindex="1" onclick="benefit1()">
                    <h1>Interactive Lessons</h1>
                    <p>Learn faster thorugh interactive lessons</p>
                </div>
                <div class="benefit-2" tabindex="2" onclick="benefit2()">
                    <h1>Certificated Tutors</h1>
                    <p>All of our tutors are certificated</p>
                </div>
            </div>
            
            <div id="what-we-offer-bottom">
                <div class="benefit-3" tabindex="3" onclick="benefit3()">
                    <h1>Trusted by Parents</h1>
                    <p>Some more text</p>
                </div>
                <div class="benefit-4" tabindex="4" onclick="benefit4()">
                    <h1>Gamification</h1>
                    <p>Some more text</p>
                </div>
            </div>
        </div>
    </div>

    <!--Links to the JavaScript file-->
    <script src="/js/myScript.js"></script>

</body>
</html>