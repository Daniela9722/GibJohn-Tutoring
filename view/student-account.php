<?php
    session_start();
    if(isset($_SESSION["email"]) && isset($_SESSION["id"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>

    <!--Download document for the icons-->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
 
    <!--Connects to the styles.css file-->
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <div class="side-nav">
        <div class="side-nav-user">
            <h4>Hello</h4> 
        </div>
        <div class="side-nav-list">
            <a href="#">Account</a>
            <a href="#">Dashboard</a>
        </div>
    </div>
</body>
</html>
<?php
    }
    else{
        echo "Something Went Wrong";
    }
?>