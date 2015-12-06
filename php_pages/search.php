<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
$pageTitle = 'lesuirely | Search';
include 'header.php';
?>

<div class="vuser" id="searchbox">
  <?php
  $itempage=1;
  $search='';
  $max=0;
  $jsonData=searchMovie($search, $itempage, $max);
  $json = json_decode($jsonData);
  ?>
  <h3> Movies from your key word: <?=$search?></h3>
  <table>
    <tr class="movie">
      <?php
      $count=0;
      for($i=0;$i<count($json);$i++){
        $data= $json[$i];
        if($count<4){
          $count++;
          ?>
          <td class="item center"><img class="book" src = "<?=$data->imgurl?>"><h5><a name="<?=$data->id?>" href="itemdetail.php?id=<?=$data->id?>&cat=movie"><?=$data->title?> <span>(<?=$data->year?>)</span></a></h5></td>
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
  <hr>
  <h3> Books from your key word: <?=$search?></h3>
  <?php
  $itempage=1;
  $jsonData=searchBook($search, $itempage);
  $books = json_decode($jsonData);
  ?>
  <table>
    <tr class="movie">
      <?php
      $count=0;
      for($i=0;$i<count($books);$i++){
        $data= $books[$i];
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
