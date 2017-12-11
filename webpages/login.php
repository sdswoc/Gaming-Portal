<?php
session_start();
if (isset($_SESSION["uid"]))
   header('location:/webpages/home.php');

?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        
        <link rel="stylesheet" href="../css/signup.css">
    </head>
    <body>
         <?php
            $email = $password = "";
            $emailerr = $passerr = "";
            function prepare($data){            
              $data = trim($data);
              $data = stripslashes($data);
               $data = htmlspecialchars($data);
              return $data;}
            if ($_SERVER["REQUEST_METHOD"] === "POST")
              {
                 if(empty($_POST["email"]))
                {
                  $emailerr = "<div class=\"error\">  * Email is required! </div>";
                }
              else{            
                $email = prepare($_POST["email"]);                    
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailerr = "<div class=\"error\"> Invalid email format </div>";
                    }
                    else {
                        $emailerr="";
                        $password = prepare($_POST["pass"]);
                        $passHash = hash("sha256" , $password);
                        include "config.php";
                        $conn = new mysqli($servername, $username , $passd , $dbname);
                        if($conn->connect_error){
                               die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "select * From userinfo where email='" . $email . "' and password='" . $passHash . "'";
                        $result = $conn->query($sql);
                         
                         if ($result->num_rows ===1){
                            $user = $result->fetch_assoc();
                            $_SESSION["uid"] = $user["userid"];
                            $_SESSION["email"] = $user["email"];
                            $_SESSION["fname"] = $user["fname"];
                            $_SESSION["lname"] = $user["lname"];
                            $conn->close();
                            header('Location: /webpages/home.php');
                        }
                        else{
                            $passerr = "<div class=\"error\"> Wrong Email or Password ! </div>";

                        }
                    }

                }
            }
            ?>       
        <div class="navigate">
            <a class=" nav-head" id="nav-hd" href="../index.html">WebSiteName</a> 
            <ul class="nav-ri" style="margin-left:-50px; ">
                <form class="form-inline login-form" action="login.php" method="POST">
                    <input type="text" placeholder="Email or Phone" name="email" class=" login-text transp" id="email">
                    <input type="password" placeholder="password" name="pass" class=" login-text transp" id="pwd">
                    <button  type="submit" class="submit-button transp">Sign In</button>
                    <br>
                    <div class="forgot">Forgotten Password ?</div>
                </form>
            </ul>
        </div>
        <form id="msform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">    
            <fieldset>
                <h2 class="fs-title">Sign In</h2>
                <div class="login-image"><img src="../photos/avtar.png"></div>
                <input type="text" name="email" value="<?php echo $email ?>"  placeholder="Email"  />
                <?php echo $emailerr ; ?>
                <input type="password" name="pass"  value="<?php echo $lname ?>"  placeholder="Password"  />
                <?php echo $passerr ; ?>
                <div class="forgot-form"><a href="#"> Forgot your Password?</a></div>
                <input type="submit" name="submit" class="submit action-button" value="Sign In"  />
                <div class="signup-message">Don't have an account? <a href="signup.php">Create Account </a></div>
            </fieldset>
        </form>
    </body>
</html>
