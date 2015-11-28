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
    Movies
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
            <li>
            <div class="dropdown">
              <a data-toggle="dropdown">Your Account
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="userInfo.html">Your account</a></li>
                  <li><a href="#">Your orders</a></li>
                </ul>
              </div>
            </li>
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
    <div>
      <div id="headerbar">
        <ul id="catli">
          <li>
            <h2>
              Categories
            </h2>
          </li>
          <li>
            <a href="book.php?tag=web">Web</a>
          </li>
          <li>
            <a href="book.php?tag=computer-science">computer-science</a>
          </li>
          <li>
            <a href="book.php?tag=music">classical-music</a>
          </li>
          <li>
            <a href="book.php?tag=agriculture">agriculture</a>
          </li>
          <li>
            <a href="book.php?tag=crime">crime</a>
          </li>
          <li>
            <a href="book.php?tag=cultural">cultural-studies</a>
          </li>
          <li>
            <a href="book.php">All Categories</a>
          </li>
        </ul>
      </div>
      <div class="right">
        <table>
          <?php
          $itempage=1;
          $tag='';
          $people='';
          $jsonData=getBooks($itempage, $tag, $people);
          $json = json_decode($jsonData);

          ?>
          <tr class="movie">
            <?php
            $count=0;
            for($i=0;$i<count($json);$i++){
              $data= $json[$i];
              if($count<4){
                $count++;
                ?>
                <td class="item center"><img class="book" src = "<?=$data->imgurl?>"><h5><a name="<?=$data->id?>" href="itemdetail.php?id=<?=$data->id?>&cat=book"><?=$data->title?></a></h5></td>
                <?php
              }
              else{
                $count=0;
                $i--;
                ?>
              </tr>
              <tr class="movie">
                <?php
              }
            }
            ?>

          </tr>
        </table>
        <div id="changePage" class="center">
          <ul class="pagination">
            <?php
            $max =getMaxid('book', $tag, $people);
            for($i=1;$i<$max/40+1;$i++){
              if($i==$itempage-1){
                echo "<li class='active'><a href='book.php?page=$i&tag=$tag&people=$people'>$i</a></li>";
              }else{
                echo "<li><a href='book.php?page=$i&tag=$tag&people=$people'>$i</a></li>";
              }
            }
             ?>
          </ul>
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
