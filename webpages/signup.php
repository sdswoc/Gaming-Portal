<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Signup</title>
  
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="../css/signup.css">

  
</head>

<body>
<?php
$email = $password = $password2 = $fname = $lname = $gender  ="";
$emailerr = $passerr = $pass2err = $fnameerr = $lnameerr  ="";
$flag1 = $flag2 = $flag3 = $flag4 =$flag5 = false;  
function prepare($data){

  $data = trim($data);
  $data = stripslashes($data);
   $data = htmlspecialchars($data);
  return $data;}

  if ($_SERVER["REQUEST_METHOD"] == "POST")
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
  $flag1 = true;
}

    }
    if(empty($_POST["pass"]))
    {
      $passerr = "<div class=\"error\">  * Password is required! </div>";
    }
  else{
    $password = prepare($_POST["pass"]);
    if (strlen((string)$password)<6)
    {
      $passerr = "<div class=\"error\"> Your password must be at least 6 characters long.</div>";
    }
    else{
      $passerr="";
      $flag2 = true;
    }
  }
  if(empty($_POST["cpass"]))
    {
      $pass2err = "<div class=\"error\">  * Confirmation is required! </div>";
    }
  else{
    $password2 = prepare($_POST["cpass"]);
    if ($password != $password2)
    {
      $pass2err = "<div class=\"error\">Confirm Password do not match Password</div>";
    }
    else{
      $pass2err ="";
      $flag3 = true;
    } 
    }

  
    if(empty($_POST["fname"]))
    {
      $fnameerr = "<div class=\"error\">  * First Name is required! </div>";
    }
  else{
    $fname = prepare($_POST["fname"]);
    }
    if(empty($_POST["lname"]))
    {
      $lnameerr = "<div class=\"error\">  * Last Name is required! </div>";
    }
  else{
    $lname = prepare($_POST["lname"]);
    }
    $gender = prepare($_POST["gender"]);
    

  }

 ?>

  <div class="navigate">
   <a class=" nav-head" id="nav-hd" href="../index.html">WebSiteName</a> 
    <ul class="nav-ri" style="margin-left:-50px; ">
       <form class="form-inline login-form" action="signup.php">
    <input type="text" placeholder="Email or Phone" class=" login-text transp" id="email">

    <input type="password" placeholder="password" class=" login-text transp" id="pwd">
    <button  type="submit" class="submit-button transp">Login</button>
      <br><div class="forgot">Forgotten Password ?</div>
    
  
</form> 
    </ul>
  </div>


  <!-- multistep form -->
<form id="msform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="email" value="<?php echo $email ?>" placeholder="Email"  />
    <?php echo $emailerr ?>
    <input type="password" name="pass" placeholder="Password" />
    <?php echo $passerr ; ?>
    <input type="password" name="cpass" placeholder="Confirm Password" />
    <?php echo $pass2err ; ?>
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" value="<?php echo $fname ?>"  placeholder="First Name"  />
    <?php echo $fnameerr ; ?>
    <input type="text" name="lname"  value="<?php echo $lname ?>"  placeholder="Last Name"  />
    <?php echo $lnameerr ; ?>
    <div class="gender">
    <input type="radio" class="gen" name="gender" value="male" checked> Male
  <input type="radio" class="gen" name="gender" value="female"> Female
  <input type="radio" class="gen" name="gender" value="other"> Other
</div>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit"  />
  </fieldset>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>  
<script src="../js/signup.js"></script>
</body>
</html>