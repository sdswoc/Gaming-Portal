<?php
session_start();
if (!isset($_SESSION["uid"]))
    header('location:/public/icludes/login.php');
?>	
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suggest Game</title>
    <link rel="stylesheet" type="text/css" href="../static/css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../static/css/addgame.css">
    <link rel="stylesheet" href="../static/css/footer.css">

    <?php
    if ($_SERVER["REQUEST_METHOD"]=== "POST")
    {
        function prepare($data){

          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
      $gamename = prepare($_POST["gamename"]);
      $genre = prepare($_POST["genre"]);
      $numplayer = prepare($_POST["players"]);
      $skills = prepare($_POST["skill"]);
      $describe = prepare($_POST["describe"]);
      require_once("config.php");
      $conn = new mysqli($servername , $username , $passd , $dbname) ;
      if ($conn->connect_error){
        die("Connection failed " . $conn->connect_error );
    }
    if($_SESSION["gameArray"]["id"]===null){

        $sql = "insert into games(gamename, genre , skill , numplayer , description , uid) values ('$gamename' , '$genre' , '$skill' , '$numplayer' , '$describe' , '" . $_SESSION["uid"] . "')";
        if ($conn->query($sql)===TRUE){

            $gameid = $conn->insert_id;
            $_SESSION["gameArray"] = array("id"=>$gameid,"flag" => 1,"name"=>$gamename,"genre" => $genre, "num"=>$numplayer,"skills" => $skills , "describe" => $describe );
            $conn->close();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if ($_SESSION["gameArray"]["flag"] ===1){
        $gameid = $_SESSION["gameArray"]["id"];
        echo $_SESSION["gameArray"]["id"];
        $file_dir = "../static/games/" . $gamename . $gameid . "/"  ;
        mkdir($file_dir);
        $err1 =$err2=$err3="";
        function file_upload($file_name , $num , $gamename , $gameid , &$err){
            $ext = end(explode("." , $_FILES[$file_name][ "name"]));
            $file_dir = "../static/games/" . $gamename . $gameid . "/"  ;
            $image_dir = $file_dir . "image$num." . $ext;
            $check = getimagesize($_FILES[$file_name]["tmp_name"]);           
            if($check !== false) {                    
                if (move_uploaded_file($_FILES[$file_name   ]["tmp_name"] , $image_dir))
                {
                    $err="";
                }
                else {
                    $err = "<div class='error'> Your image was not uploaded!</div>";
                }
            }
            else {
                $err =  "<div class='error'>File is not an image.</div>";
            }
        }
        if($_FILES["file1"]["name"]!==""){
            file_upload("file1", "1" , $gamename , $gameid , $err1);
        }
        if($_FILES["file2"]["name"]!==""){
            file_upload("file2", "2" , $gamename , $gameid , $err2);
        }
        if($_FILES["file3"]["name"]!==""){
            file_upload("file3", "3" , $gamename , $gameid , $err3);
        }
        if ($err1 ==="" && $err2 ==="" && $err3 ===""){
            unset($_SESSION["gameArray"]);

            header('location:/public/includes/home.php');
        }
    }
}
?>
</head>
<body>
    <?php include "navbar2.php" ?>
    <div class="container">
        <form method="POST" class="info-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-head">Suggest A game</div>
            <input type="text" placeholder="Name of the Game" value="<?php echo$_SESSION["gameArray"]["name"];?>" name="gamename" class="game-input" required>
            <?php echo $nameerr ?>
            <input type="text" value="<?php echo$_SESSION["gameArray"]["genre"]?>" placeholder="Genre" name="genre">

            <input type="text" name="players" value="<?php echo $_SESSION["gameArray"]["num"]?>" placeholder="Number of players required">
            <input type="text" value="<?php echo $_SESSION["gameArray"]["skills"] ?>" name="skill" placeholder="Skills required to play the game">             
            <div class="form-subhead">Got Pictures? Upload</div>
            <input type="file"  name="file1" id="file1" class="fileinput">
            <label for="file1" class="label-btn">
                <i class="fa fa-upload" aria-hidden="true"></i>
                Upload An Image
            </label>
            <?php echo $err1 ?>
            <input type="file"  name="file2" id="file2" class="fileinput">
            <label for="file2" class="label-btn">
                <i class="fa fa-upload" aria-hidden="true"></i>
                Upload An Image
            </label>
            <?php echo $err2 ?>        
            <input type="file"  name="file3" id="file3" class="fileinput">
            <label for="file3" class="label-btn">
             <i class="fa fa-upload" aria-hidden="true"></i>
             Upload An Image
         </label>
         <?php echo $err3 ?>            
         <textarea rows="5" cols="55" wrap="hard" name="describe" placeholder="Give Details About Game"><?php $_SESSION["gameArray"]["describe"]?></textarea>
         <input type="submit" class="submit-btn"  value="Suggest Game" name="submit">
     </form>
 </div>
 <?php include "footer.php" ?>
</body>
</html>