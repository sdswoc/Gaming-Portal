<?php
$servername = $username = $passd = "";
                  $servername = "localhost";
                  $username = "root";
                  $passd = "3646";
                  $dbname = "gameportal";
                  $conn = new mysqli($servername, $username , $passd , $dbname);
                  if($conn->connect_error){
                    die("Connection failed: " . $conn->connect_error);
                  }
 ?>