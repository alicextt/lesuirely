<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("../php_func/func.php");
if(isset($_SESSION['id'])){
saveSession();
}
session_unset();
session_destroy();
ini_set('display_errors', 'On');

?>
<!DocType html>
<html>
<head>
  <title>
    Leisurely | Logout page
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src = "/lesuirely/js/event.js" text = "text/javascript" language = "javascript"></script>

  <link href="/lesuirely/css/styles.css" rel="stylesheet">
</head>
<body onload="getDate()">
  <!-- header-->
  <noscript> Browser does not support JAVASCRIPT</noscript>
  <header class="container">
    <div class="horizontal">
      <ul>
        <li><a href="/lesuirely/php_pages/index.php"><img src="/lesuirely/images/logo.png" alt="leisurely" height="110"
          width="125"></li></a>
          <li><a href="movie.php">Movies</a></li>
          <li><a href="/lesuirely/php_pages/book.php">Books</a></li>
          <li>
            <form accept-charset="utf-8" class="nav-search" method="GET" name="site-search" action="/lesuirely/php_pages/search.php">
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
            <li><a id = "signup" href = "/lesuirely/html/signUp.html">Join Today</a></li>
            <li><a id = "sign" href="/lesuirely/html/login.html">Sign In</a></li>
            <?php
          }else{
            ?>
            <li><a id = "signup" href = "userInfo.html">Info</a></li>
            <li><a id = "sigout" href="/lesuirely/php_pages/logout.php">Logout</a></li>
            <?php
          }
          ?>
          <li><a href="checkout.php"><img src="/lesuirely/images/cart.png" alt="Lesuirely" height="50" width="50"><span id="cart"><?php
          echo getCartItemQuantity();
          ?></span></a></li>
        </ul>
      </header>
      <div class="vuser">
        <center>
          <h1 class="row voffset150">
            GOODBYE! We hope to see you again!
          </h1>
        </center>
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
