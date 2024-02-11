<?php
include 'conx.php';
session_start();
session_destroy();
header('Location: login.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Logout</title>
</head>
<body>
<nav>
<ul>
        <!-- <li><a href="index.php">Home</a></li> -->
       
        <li><a href="operation.php">Operation</a></li>
        <li><a href="modules.php">Modules</a></li>
        <!-- <li><a href="login.php">Login</a></li> -->
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>
</body>
</html>