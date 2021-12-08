<?php

session_start();

if(isset($_SESSION['ID']) && isset($_SESSION['PWD']))
   {
    session_destroy();
    header("Location: index.html");
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Logout</title>
</head>
<body class="bg-black text-white text-center">
    <h1>Logged out...</h1>
    <h2><a href="index.html">Click here for main page.</a></h2>
</body>
</html>
<?php
   }
    else
    {
        echo "No session exists!";
    }
?>