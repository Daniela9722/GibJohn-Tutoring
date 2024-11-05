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

    <nav id="navigation-container-1">
        <!--Logo-->
        <a href="index.php"><img id="navigation-logo" src="/static/202129597-removebg-preview.png"></a>
            
            <!--Menu navigation links-->
            <ul id="navigation-links">
                <li><a class="nav-links" href="index.php"><i style="font-weight: bold; font-size: 18px;" class="bx bx-home"></i></b></li>
                <li><a class="nav-links" href="/view/about-us.php">About Us</a></li>
                <li><a class="nav-links" href="/view/contact-us.php">Contact Us</a></li>
                <li><a id="sign-in-link" href="/view/sign-in.php">Sign In</a></li>
                <li><a id="sign-up-link" href="/view/sign-up.php">Sign Up</a></li>
            </ul>
    </nav>

    <div id="navigation-container-2">
        <!--Logo-->
        <a href="index.php"><img id="navigation-logo" src="/static/202129597-removebg-preview.png"></a>

        <!--Toggle menu for smaller screens-->
        <div>
            <!--Add menu icon that can be ticked off and on-->
            <input type="checkbox" name="" id="toggler">
            <!--Menu icon-->
            <label onclick=showSidebar() for="toggler"  class="bx bx-menu"></label>
        </div>
    </div>

    <!--Shouldn't use <nav> twice as this could cause some issues-->
    <aside>
        <ul class="menu-list">
            <!--To Exit the toggled menu-->
            <input type="checkbox" name="" id="check">
            <label onclick=hideSidebar() for="check" class='bx bx-x'></label>

            <!--Menu Items-->
            <li><a href="index.php">Home</a></li>
            <li><a href="about-us.php">About Us</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
            <li><a href="sign-in.php">Sign In</a></li>
            <li><a href="Sign-up.php">Sign Up</a></li>
        </ul>
    </aside>

    <!--Links to the JavaScript file-->
    <script src="/js/myScript.js"></script>
    
</body>
</html>