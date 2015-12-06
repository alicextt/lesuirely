<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
$pageTitle = 'lesuirely | Orders';
include 'header.php';
?>
<script src = "/lesuirely/js/item.js" text = "text/javascript" language = "javascript"></script>

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
<?php include 'footer.php'; ?>
