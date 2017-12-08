
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
     
    </head>
    <body>
    	<?php
    		 echo "Welcome " . $_SESSION["fname"] . " " . $_SESSION["lname"] ;
    	 ?>
    	 <a href="addgame.php"> Suggest a game</a>
    	 <br>
    	 <a href="logout.php">Logout</a>
    </body>
    </html>