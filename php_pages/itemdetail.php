<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
sif (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 'On');
include("../php_func/func.php");
?>
<!DocType html>
<html>
<head>
  <title>
    <?=$_GET['cat']?>
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src = "/lesuirely/js/event.js" text = "text/javascript" language = "javascript"></script>
  <script src = "/lesuirely/js/item.js" text = "text/javascript" language = "javascript"></script>

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
            <li>
            <div class="dropdown">
              <a data-toggle="dropdown">Your Account
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/lesuirely/php_pages/userInfo.php">Your account</a></li>
                  <li><a href="/lesuirely/php_pages/order.php">Your orders</a></li>
                </ul>
              </div>
            </li>
            <li><a id = "sigout" href="/lesuirely/php_pages/logout.php">Logout</a></li>
            <?php
          }
          ?>
          <li><a href="checkout.php"><img src="/lesuirely/images/cart.png" alt="Lesuirely" height="50" width="50"><span id="cart"><?php
          echo getCartItemQuantity();
          ?></span></a></li>
        </ul>
      </div>
    </header>
    <div class="right narrow">
      <?php
      $data= getitembyid($_GET['cat'],$_GET['id']);
      $json = json_decode($data);
      ?>
      <div class="left">
        <img src="<?=$json->imgurl?>">
      </div>
      <div id="itemdetails">
        <div class="rate"><?=$json->rate?></div>
        <h1 id="title"><?=$json->title?></h1>
        <span id="itemid" hidden><?=$_GET['id']?></span>
        <?php
        if($_GET['cat']=='book'){
          ?>
          <div id="bookAuthors" class="">
            <span class='smallText'>Author:</span>
            <span itemprop='author' itemscope='' itemtype='http://schema.org/Person'>
              <?php
              $authors = $json->author;
              if($authors){
                $authorarray=explode(',',$authors);
                foreach ($authorarray as $key) {
                  ?>
                  <a class="authorName" itemprop="url" href="/lesuirely/php_pages/book.php?people=<?=$key?>"><span itemprop="name"><?=$key?></span></a>
                  <?php
                } ?>
              </span>
            </div>
            <?php
          }
        }else{
            ?>
            <div id="movieActors" class="">
              <span class='smallText'>Star:</span>
              <span itemprop='actor' itemscope='' itemtype='http://schema.org/Person'>
                <?php
                $stars = $json->stars;
                if($stars){
                  $stararray=explode(',',$stars);
                  foreach ($stararray as $key) {
                    ?>
                    <a class="authorName" itemprop="url" href="movie.php?people=<?=$key?>"><span itemprop="name"><?=$key?></span></a>
                    <?php
                  } ?>
              </span>
            </div>
            <?php
          }
        }
          ?>
          <hr>
          <h4>Overview</h4>
          <p><?=$json->description?></p>
          <hr>
          <?php
          if(isset($_GET['ad'])){
          $addq= $_GET['ad'];
        }
          if(empty($addq)){
          ?>
          <div class="price">
            <table class="table table-striped">
              <tr>
                <th>Type</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Buy</th>
              </tr>
              <tr>
                <td name="type">Buy</td>
                <td name="price">$ <?=$json->price?></td>
                <td><select class="btn dropdowntoggle btn-default">
                  <option value="1" selected="">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select></td>
                <td><button class="btn btn-info">Add to cart </button></td>
              </tr>
              <tr>
                <td name="type">Rent</td>
                <td name="price">$ <?=round($json->price/3,2)?></td>
                <td><select class="btn dropdowntoggle btn-default">
                  <option value="1" selected="">1 Week</option>
                  <option value="2">2 Week</option>
                  <option value="3">3 Week</option>
                  <option value="3">4 Week</option>
                </select></td>
                <td><button class="btn btn-info">Add to cart </button></td>
              </tr>
            </table>
          </div>
          <?php }else{ ?>
            <div class="center">
            <h4> You have added <span><?=$addq?></span> items into the cart !</h4>
            <button class="btn btn-success" id="continuesh"> Continue shopping</button>
            <button class="btn btn-success" id="detailcheckout"> Checkout</button>
          </div>
            <?php } ?>
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
