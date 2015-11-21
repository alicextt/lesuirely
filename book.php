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
          <li><a id = "signup" href = "signup.html">Join Today</a></li>
          <li><a id = "sign" href="login.html">Sign In</a></li>
          <li><a href="checkout.html"><img src="cart.png" alt="Lesuirely" height="50" width="50"></a></li>
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
            <a href="book.php">Web</a>
          </li>
          <li>
            <a href="book.php">computer-science</a>
          </li>
          <li>
            <a href="book.php">classical-music</a>
          </li>
          <li>
            <a href="book.php">agriculture</a>
          </li>
          <li>
            <a href="book.php">crime</a>
          </li>
          <li>
            <a href="book.php">cultural-studies</a>
          </li>
          <li>
            <a href="book.php">All Categories</a>
          </li>
        </ul>
      </div>
      <div class="right">
        <table>
          <?php
          ini_set('display_errors', 'On');

          include("func.php");
          $itempage=1;
          $jsonData=getBooks($itempage);
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
                 <td class="item center"><img class="book" src = "<?=$data->imgurl?>"><h5><a name="<?=$data->id?>"><?=$data->title?></a></h5></td>
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
      </div>
    </div>
    <div id="copycont">
      <footer>
          <p class="center"> Copyright@2015, designed by <a class="yellow">Leisurely Admin | Privacy Policy</a></p>
          <p class="center">  Site Last Modified:
            <span id="lastModified"/> </p>
            <noscript> Browser does not support JAVASCRIPT</noscript>
      </footer>
    </div>
  </body>
  </html>
