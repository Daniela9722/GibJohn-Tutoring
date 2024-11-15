<?php
    //Includes the file that connects to the database
    include "C:/Users/335364/OneDrive - Milton Keynes College O365/GibJohn Tutoring/core/spec.php";
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

    <!--Adds some information to attract the user, since homepage is whet the user
    sees first when entering the website-->
    <div id="attract-users">
        <span>5-star reviews</span>
        <span>1700 schools trust us</span>
        <span>275,009 students</span>
    </div>

    <!--States the benefits of using GibJohn Tutoring-->
    <div id="what-we-offer">
        <!--IMages that will change based on which benefit text are has been clicked on-->
        <div id="what-we-offer-img">
            <img id="benefit-image-1" src="/static/online-science-tutoring-abstract-concept-illustration-personalised-learning-online-educational-platform-homeschooling.png" alt="Online science class">
            <img id="benefit-image-2" src="/static/rb_40416.png" alt="Person with certificate">
            <img id="benefit-image-3" src="/static/rb_1357.png" alt="Trusted by parents">
            <img id="benefit-image-4" src="/static/rb_2149247168.png" alt="Gamification">
        </div>

        <!--The benefit text-->
        <div id="what-we-offer-text">
            <!--The first row of the benefits-->
            <div id="what-we-offer-top">
                <!--The first benefit-->
                <!--Calls a JavaScript function to that will enable the appropriate 
                image to be displayed whilst the other images will not be displayed-->
                <!--The tabindex attribute specifies the order that the elements are within the tab
                and they are useful for screen navigation as it determines which element it 
                should focus on when-->
                <div class="benefit-1" tabindex="1" onclick="benefit1()">
                    <h1>Interactive Lessons</h1>
                    <p>Learn faster thorugh interactive lessons</p>
                </div>
                <!--The second benefit-->
                <!--Calls a JavaScript function to that will enable the appropriate 
                image to be displayed whilst the other images will not be displayed-->
                <div class="benefit-2" tabindex="2" onclick="benefit2()">
                    <h1>Certificated Tutors</h1>
                    <p>All of our tutors are certificated</p>
                </div>
            </div>
            
            <!--The second row of the benefits-->
            <div id="what-we-offer-bottom">
                <!--The third benefit-->
                <!--Calls a JavaScript function to that will enable the appropriate 
                image to be displayed whilst the other images will not be displayed-->
                <div class="benefit-3" tabindex="3" onclick="benefit3()">
                    <h1>Trusted by Parents</h1>
                    <p>Some more text</p>
                </div>
                <!--The forth benefit-->
                <!--Calls a JavaScript function to that will enable the appropriate 
                image to be displayed whilst the other images will not be displayed-->
                <div class="benefit-4" tabindex="4" onclick="benefit4()">
                    <h1>Gamification</h1>
                    <p>Some more text</p>
                </div>
            </div>
        </div>
    </div>

    <!--About us section of the homepage-->
    <div id="about-us-section">
        <h1>About Us</h1>
        <p>Some text describing what GibJohn offers</p>
        <!--Link that will re-direct the user to the about us page-->
        <a href="about-us.php">Read More</a>
    </div>

    <!--Frequently Asked Questions Section of the homepage-->
    <div id="faq">
        <!--Title for the section-->
        <div id="faq-top">
            <h1>Frequently Asked Questions</h1>
        </div>
        <!--FAQ questions and answers-->
        <div id="faq-bottom">
            <!--The first question and answer-->
            <details>
                <!--Question and the icons for when the answer is hidden and revealed-->
                <summary>Which tutor is right for you?<i class='bx bx-chevron-up'></i><i class='bx bx-chevron-down'></i></summary>
                <!--Answer to the question-->
                <p>Before you look for a tutor, it's helpful to have a really clear idea of exactly where your child needs help - whether with a specific English Literature text, one area of Maths or their exam technique - and filter your choices accordingly. If you're not sure where they need to focus, having a chat with them or their teacher can help you work out the best place to start. In a free meeting, you can then ask the tutor any questions you like and see how well they get on with your child before deciding to book.</p>
            </details>
            <!--The second question and answer-->
            <details>
                <!--Question and the icons for when the answer is hidden and revealed-->
                <summary>Why is online tutoring important?<i class='bx bx-chevron-up'></i><i class='bx bx-chevron-down'></i></summary>
                <!--Answer to the question-->
                <p>Online tutoring gives kids the chance to learn at their own pace and in a way that matches their learning style. Teens are often too shy to put their hand up in class - especially if they're struggling. The reassurance of one-to-one tutoring means they can ask all the questions they want, and go over topics as much as they need until they get it.</p>
            </details>
            <!--The third question and answer-->
            <details>
                <!--Question and the icons for when the answer is hidden and revealed-->
                <summary>What are the benefits of online tutoring?<i class='bx bx-chevron-up'></i><i class='bx bx-chevron-down'></i></summary>
                <!--Answer to the question-->
                <p>One-to-one tutoring lets kids unleash their potential. Worried about learning gaps? We'll fill them in. No tutors in your area? We've got you covered. No academic confidence? No problem. Whatever your child needs help with, their tutor will guide them through tricky topics and boost their self-belief. With the personalised one-to-one support from their tutor, your child can get the grades they deserve.</p>
            </details>
            <!--The forth question and answer-->
            <details>
                <!--Question and the icons for when the answer is hidden and revealed-->
                <summary>How much does a tutor cost?<i class='bx bx-chevron-up'></i><i class='bx bx-chevron-down'></i></summary>
                <!--Answer to the question-->
                <p>Our tutors set their own prices based on their experience and qualifications, starting from £25/hour at GCSE level. Most of our tutors charge between £25 and £39 an hour. </p>
            </details>
            <!--The fifth question and answer-->
            <details>
                <!--Question and the icons for when the answer is hidden and revealed-->
                <summary>How do online lessons work?<i class='bx bx-chevron-up'></i><i class='bx bx-chevron-down'></i></summary>
                <!--Answer to the question-->
                <p>We have our own online lesson space with video chat, messaging and an interactive whiteboard - this makes it easy for students and tutors to talk to each other, discuss tricky concepts and do practice questions together. With the live video chat, they can have a natural back-and-forth conversation - just like on FaceTime, Whatsapp and other apps teens use all the time.</p>
            </details>
        </div>
    </div>

    <!--Links to the JavaScript file-->
    <script src="/js/myScript.js"></script>

<!--Includes the file containing the footer html code-->
<?php
    include "footer.php";
?>

</body>
</html>