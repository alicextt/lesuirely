<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
$pageTitle = $_GET['cat'];
include 'header.php';
?>
<script src = "/lesuirely/js/item.js" text = "text/javascript" language = "javascript"></script>

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
      <?php
    }else{
      ?>
      <div class="center">
        <h4> You have added <span><?=$addq?></span> items into the cart !</h4>
        <button class="btn btn-success" id="continuesh"> Continue shopping</button>
        <button class="btn btn-success" id="detailcheckout"> Checkout</button>
      </div>
      <?php
    }
    ?>
  </div>
</div>
<?php include 'footer.php'; ?>
