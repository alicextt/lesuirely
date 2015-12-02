<?php
// ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 'On');
include("../php_func/func.php");
?>
<!DocType html>
<html>
<head>
  <title>Leisurely | Orders</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src = "/lesuirely/js/item.js" text = "text/javascript" language = "javascript"></script>
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

      <div class="vuser" id="searchbox">
        <?php
        if(isset($_SESSION['user'])){
          $user= $_SESSION['user'];
          echo "<h3>$user, here is your past order details!</h3>";
        }
        ?>
        <?php
        $itempage=1;
        $search='';
        $max=0;
        $jsonData= getUserPurchasehistory($_SESSION['id']);
        $data = json_decode($jsonData);
        ?>
        <div class="box" id="orderbox">
          <fieldset>
            <legend>Order Details</legend>
              <table class="table">
              <?php
              if(is_array($data)){
                $lastoid='';
              foreach($data as $key){
                $oid = $key->purchaseId;
                $linkid=$key->catid;
                $price=$key->price;
                $qty=$key->qty;
                $tprice = (float)$price * (int)$qty;
                $category=$key->category;
                if($lastoid=='' || $oid!=$lastoid){
              ?>
              </table>
              <table class="table">
                  <tr>
                    <th class="col-md-2" colspan="2">Order Placed <br> <?=$key->purchasedate?></th>
                    <th class="col-md-2">Total<br><span class="totalpriceperpo red"></span></th>
                    <th class="col-md-2">Ship To<br> <a href='#'><?=$key->person?><div class='wrap'><p><?=$key->person?><br>
                      <?=$key->address1?><br>
                      <?=$key->address2?><br>
                      <?=$key->city?><br>
                      Phone: <?=$key->phone?><br></p>
                    </div></a></th>
                    <th class="col-md-2">Ship To<br> <?=$key->person?></th>
                    <th class="col-md-2">Status <br><?=$key->status?></th>
                    <th class="col-md-3 center" colspan="2">Order #: <?=$oid?></th>
                  </tr>
                  <?php
                }
                  ?>
                <tr>
                <td name="ctype"><?=$key->category ?></td>
                <td name="ptype"><?=$key->type?></td>
                <td name="img" id='purchasetitle'><img src=<?=$key->imgurl?> width=100 height=150></td>
                <td name="price" colspan="2" ><a href="itemdetail.php?id=<?=$linkid?>&cat=<?=$category?>"><?=$key->title?></a><br><?=$qty?> x $<?=$price?> = <span class='red'>$ <span class="itemprice" ><?=$tprice?></span></span></td>
                <td name="qty" id="purchaseqty" class="center"><div class="cartqty">
                <p>  <?php
                  echo '<span>'.$qty.'</span>';
                  if ($key->type=='rent') {
                   echo ' weeks';
                }else{
                  echo ' items';
                }
                ?></p>
                </div>
                <div id="buyagain"><span class="itemid" hidden><?=$key->catid?></span><button class="btn btn-danger">Buy Again</button>
                </div></td>
              </tr>
              <?php
              $lastoid=$oid;
              }
            }
              ?>
            </table>
          </fieldset>
        </div>
        <div id="changePage" class="center">
          <ul class="pagination">
            <?php
            for($i=1;$i<$max/40+1;$i++){
              if($i==$itempage-1){
                echo "<li class='active'><a href='/lesuirely/php_pages/search.php?page=$i&search=$search'>$i</a></li>";
              }else{
                echo "<li><a href='/lesuirely/php_pages/search.php?page=$i&search=$search'>$i</a></li>";
              }
            }
             ?>
          </ul>
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
