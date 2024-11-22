<?php
    session_start();
    if(isset($_SESSION["email"]) && isset($_SESSION["studentID"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
</body>
</html>
<?php
    }
?>