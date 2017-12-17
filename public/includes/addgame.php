<?php
session_start();
if (!isset($_SESSION["uid"]))
    header('location:/public/static/login.php');
?>	
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Suggest Game</title>
        <link rel="stylesheet" type="text/css" href="../static/css/reset.css">
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
            include "config.php";
            $conn = new mysqli($servername , $username , $passd , $dbname) ;
            if ($conn->connect_error){
                die("Connection failed " . $conn->connect_error );
            }
            if($_SESSION["gameid"]===null){

                $sql = "insert into games(gamename, genre , skill , numplayer , description , uid) values ('$gamename' , '$genre' , '$skill' , '$numplayer' , '$describe' , '" . $_SESSION["uid"] . "')";
                if ($conn->query($sql)===TRUE){
                
                    $gameid = $conn->insert_id;
                    $_SESSION["gameid"] = $gameid;
                    $_SESSION["flag1"] = 1 ;
                    $_SESSION["gname"] = $gamename;
                    $_SESSION["genre"] = $genre;
                    $_SESSION["numplayer"] = $numplayer;
                    $_SESSION["skills"] = $skills;
                    $_SESSION["describe"] = $describe;
                    
                    $conn->close();
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;

            
                }
            }
            if ($_SESSION["flag1"] ===1){

                
                $gameid = $_SESSION["gameid"];

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
                            $err = "Your image was not uploaded!";
                        }
                    }
                    else {
                        $err =  "File is not an image.";
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
                    unset($_SESSION["flag1"]);
                    unset($_SESSION["gameid"]);
                    unset($_SESSION["gname"]);
                    unset($_SESSION["genre"]);
                    unset($_SESSION["numplayer"]);
                    unset($_SESSION["skills"]);
                    unset($_SESSION["describe"]);

                    header('location:/public/includes/home.php');
                    
                
                }
            }
        }

     ?>
    </head>
    <body>
        <?php include "navbar2.php"?>
    	<div class="container">
    		<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    		     <div>Suggest A game</div>
                <table id="l">
    			     <tr>
                         <td><label>Name</label></td>
    			         <td><input type="text" placeholder="Name of the Game" value="<?php echo $_SESSION['gname'];?>" name="gamename" class="game-input" required></td>
                         <?php echo $nameerr ?>
                    </tr>
    			     <tr>
                        <td><label>Genre</label></td>
    		            <td><input type="text" value="<?php echo $_SESSION['genre'] ?>" placeholder="Genre" name="genre"></td>
    			     </tr>
                     <tr>
                        <td><label>Players</label></td>
    		            <td><input type="text" name="players" value="<?php echo $_SESSION['numplayer']?>" placeholder="Number of players required"></td>
                    </tr>				
    			     <tr>
    		            <td><label>Skills Required</label></td>
    		            <td><input type="text" value="<?php echo $_SESSION['skills']?>" name="skill" placeholder="Skills required to play the game"></td>
                    </tr>   
                    <tr>
                        <td>Got Pictures? Upload</td>
                        <td><input type="file"  name="file1"></td>
                        <td><?php echo $err1 ?></td>
                    </tr>                   
                    <tr>
                        <td></td>
                        <td><input type="file"  name="file2"></td>
                        <td><?php echo $err2 ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="file"  name="file3"></td>
                        <td><?php echo $err3 ?></td>

                    </tr>
                </table>
                <textarea rows="5" cols="55" wrap="hard" name="describe" placeholder="Short Description:">         
                <?php echo $_SESSION['describe']?>        
                </textarea>
                <input type="submit" class="submit-btn"  value="Suggest Game" name="submit">
      		</form>
    	</div>
        <?php include "footer.php" ?>
    </body>
    </html>