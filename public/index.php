<!DOCTYPE html>
<html>
   <meta charset="utf-8">
   <head>
      <title>Gaming Portal</title>

      <link rel="shortcut icon" href="photos/ico.ico" type="image/x-icon">
   </head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="static/css/reset.css">
   <script src="static/scripts/jquery-3.2.1.min.js"></script>
   <link rel="stylesheet" type="text/css" href="static/css/index.css">
   <link rel="stylesheet" type="text/css" href="static/css/footer.css">
   <body>
      <div class="nav-container">
         <div class="navbar">
            <div class="navbar-left">
               <div class="logo">
                  <img id="logo-img" src="photos/icon.png">
               </div>
               <div class="nav-heading">Gaming Portal</div>
            </div>
            <div class="nav-menu">
               <a href="#home">
                  <div class="nav-link nl1">Home </div>
               <a href="#game">
                  <div class="nav-link nl2">Games </div>
               </a>
               <a href="#event">
                  <div class="nav-link nl3">Events</div>
               </a>
               <a href="includes/signup.php">
                  <div class="nav-link nl4">Sign up/Sign in  </div>
               </a>
            </div>
            <div class="menu" onclick="menu();">
               <div class="bar"></div>
               <div class="bar"></div>
               <div class="bar"></div>
            </div>
         </div>
         <div class="menu-mobile" id="men">
            <a href="#top">
               <div>Home</div>
            <a href="#pra">
               <div>Games</div>
            </a>
            <a href="#vis">
               <div>Events</div>
            </a>
            <a href="includes/signup.php">
               <DIV>Login</DIV>
            </a>
         </div>
      </div>
      <script type="text/javascript" src="static/scripts/navbar.js">
      </script>
      <a name="home"></a>
      <div class="home-div">
         
         <div class="home">
            <div class="home-child-right">
               <div class="Welcome-head"><span>Welcome To </span><span>Gaming Portal</span></div>
               <div class="welcome-content">
                  <span class="typed-left">We have </span><span class="typed-right"></span>
               </div>
            </div>
         </div>
         <div class="next-div">
           <div class="wrapper">
             <div class="box" data-scroll-speed="0">G</div>
             <div class="box" data-scroll-speed="0">A</div>
             <div class="box" data-scroll-speed="0">M</div>
             <div class="box" data-scroll-speed="0">E</div>
             <div class="box" data-scroll-speed="0">S</div>
           </div>
         </div>
      </div>
      <div class="game-div" >
         <a name="game" class="game-fix"> </a>
         <div class=" games">
            <div class="game-filter gf1"></div>
            <div class="gc gc-left"><</div>
            <div class="game-body">
               <div class="game-head">Dota</div>
               <div class="game-cont">Most popular game in the campus. Played in groups of 8-15 players. </div>
               <div class="game-foot">
                  <a href="#">
                     <div class="game-btn-1">Create an Event</div>
                  </a>
                  <a href="#">
                     <div class="game-btn-2">Join Onging Event</div>
                  </a>
               </div>
            </div>
            <div class="gc gc-right">></div>
         </div>
         <div class=" games">
            <div class="game-filter gf2"></div>
            <div class="gc gc-left"><</div>
            <div class="game-body">
               <div class="game-head">Counter Strike</div>
               <div class="game-cont">Most popular game in the campus. Played in groups of 8-15 players. </div>
               <div class="game-foot">
                  <a href="#">
                     <div class="game-btn-1">Create an Event</div>
                  </a>
                  <a href="#">
                     <div class="game-btn-2">Join Onging Event</div>
                  </a>
               </div>
            </div>
            <div class="gc gc-right">></div>
         </div>
         <div class=" games">
            <div class="game-filter gf3"></div>
            <div class="gc gc-left"><</div>
            <div class="game-body">
               <div class="game-head">Teen Patti</div>
               <div class="game-cont">Most popular game in the campus. Played in groups of 8-15 players. </div>
               <div class="game-foot">
                  <a href="#">
                     <div class="game-btn-1">Create an Event</div>
                  </a>
                  <a href="#">
                     <div class="game-btn-2">Join Onging Event</div>
                  </a>
               </div>
            </div>
            <div class="gc gc-right">></div>
         </div>
         <div class=" games">
            <div class="game-filter gf4"></div>
            <div class="gc gc-left"><</div>
            <div class="game-body">
               <div class="game-head">Fifa</div>
               <div class="game-cont">Most popular game in the campus. Played in groups of 8-15 players. </div>
               <div class="game-foot">
                  <a href="#">
                     <div class="game-btn-1">Create an Event</div>
                  </a>
                  <a href="#">
                     <div class="game-btn-2">Join Onging Event</div>
                  </a>
               </div>
            </div>
            <div class="gc gc-right">></div>
         </div>
         <div class=" games">
            <div class="game-filter gf5"></div>
            <div class="gc gc-left"><</div>
            <div class="game-body">
               <div class="game-head">Mafia</div>
               <div class="game-cont">Most popular game in the campus. Played in groups of 8-15 players. </div>
               <div class="game-foot">
                  <a href="#">
                     <div class="game-btn-1">Create an Event</div>
                  </a>
                  <a href="#">
                     <div class="game-btn-2">Join Onging Event</div>
                  </a>
               </div>
            </div>
            <div class="gc gc-right">></div>
         </div>
        
      </div>
      <div class="event-div">
         <a name="event" class="event-fix"> </a>
         <div class="event-cont">
            <div class="event-head">Events</div>
            <div class="event-body">
               <div>Since the launch of Gaming Portal
               </div>               
               <div class="typed-parent">
                  <div class="event-typed"></div>
               </div>
               <div class="event-foot"><a href="#"> Let's Play a game with Us </a></div>
            </div>
         </div>
      </div>
      <div class="join-us">
         <a name="join"></a>
         <a href="includes/signup.php"><div class="join">Join Us !</div></a>
      </div>
      <?php include "includes/footer.php" ?>
      <span id="media-check"></span>
      <script src="static/scripts/typed.min.js"></script>
      <script type="text/javascript" src="static/scripts/index.js"></script>

   </body>
</html>
