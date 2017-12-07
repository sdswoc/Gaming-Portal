
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
    </body>
    </html>