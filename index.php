<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
session_start();
ini_set('display_errors', 'On');
include("func.php");
?>
<!DocType html>
<html>
<head>
  <title>
    Leisurely | Homepage
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src = "event.js" text = "text/javascript" language = "javascript"></script>

  <link href="styles.css" rel="stylesheet">
</head>
<body onload="getDate()">
    <!-- header-->
  <noscript> Browser does not support JAVASCRIPT</noscript>
  <header class="container">
    <div class="horizontal">
      <ul>
        <li><a href="index.php"><img src="logo.png" alt="leisurely" height="110"
          width="125"></li></a>
          <li><a href="movie.php">Movies</a></li>
          <li><a href="book.php">Books</a></li>
          <li>
            <form accept-charset="utf-8" class="nav-search" method="GET" name="site-search" action="search.php">
              <div>
                <button class="glyphicon glyphicon-search" id="nav-search-con" type="Submit"/>
              </div>
              <div class="nav-fill">
                <input placeholder="Search" autocomplete="off" name="search" type="text">
              </div>
            </form>
          </li>
          <?php  if(!isset($_SESSION['user'])){
            ?>
            <li><a id = "signup" href = "signup.html">Join Today</a></li>
            <li><a id = "sign" href="login.html">Sign In</a></li>
            <?php
          }else{
            ?>
            <li><a id = "signup" href = "userInfo.html">Info</a></li>
            <li><a id = "sigout" href="logout.php">Logout</a></li>
            <?php
          }
          ?>
          <li><a href="checkout.php"><img src="cart.png" alt="Lesuirely" height="50" width="50"><span id="cart"><?php
          echo getCartItemQuantity();
          ?></span></a></li>
        </ul>
      </div>
    </header>
    <div class="vuser">
      <?php
      if(isset($_SESSION['user'])){
        $user= $_SESSION['user'];
          echo "<h1>$user, Welcome Back!</h1>";
      }
       ?>
       <div class="slide">
         <div class="slider_wrapper">
           <ul id="image_slider">
             <li><a href="itemdetail.php?id=1&cat=movie"><img src="images/1.jpg"></a></li>
             <li><a href="itemdetail.php?id=39&cat=book"><img src="images/2.jpg"></a></li>
             <li><a href="itemdetail.php?id=295&cat=movie"><img src="images/3.jpg"></a></li>
             <li><a href="itemdetail.php?id=82&cat=book">  <img src="images/4.jpg"></a></li>
           </ul>
           <span class="nvgt" id="prev"></span>
           <span class="nvgt" id="next"></span>
         </div>
       </div>
    </div>

    <div id="copycont">
      <footer>
          <p class="center"> Copyright&copy2015, designed by <a class="yellow">Leisurely Admin | Privacy Policy</a></p>
          <p class="center">  Site Last Modified:
            <span id="lastModified"/> </p>
            <noscript> Browser does not support JAVASCRIPT</noscript>
      </footer>
    </div>
  </body>
  </html>
