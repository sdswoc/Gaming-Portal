<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../static/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../static/css/home.css">
    <link rel="stylesheet" href="../static/css/footer.css">    
</head>
<body>
    <?php include "navbar2.php" ?>
    <div class="home-body">
        <div class="home-cont">
            <?php include "left.php" ?>
            <?php include "center.php" ?>
            <?php include "right.php" ?>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>