<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
$pageTitle = 'lesuirely | Books';
include 'header.php';
?>

<div>
  <div id="headerbar">
    <ul id="catli">
      <li>
        <h2>
          Categories
        </h2>
      </li>
      <li>
        <a href="/lesuirely/php_pages/book.php?tag=web">Web</a>
      </li>
      <li>
        <a href="/lesuirely/php_pages/book.php?tag=computer-science">computer-science</a>
      </li>
      <li>
        <a href="/lesuirely/php_pages/book.php?tag=music">classical-music</a>
      </li>
      <li>
        <a href="/lesuirely/php_pages/book.php?tag=agriculture">agriculture</a>
      </li>
      <li>
        <a href="/lesuirely/php_pages/book.php?tag=crime">crime</a>
      </li>
      <li>
        <a href="/lesuirely/php_pages/book.php?tag=cultural">cultural-studies</a>
      </li>
      <li>
        <a href="/lesuirely/php_pages/book.php">All Categories</a>
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
            echo "<li class='active'><a href='/lesuirely/php_pages/book.php?page=$i&tag=$tag&people=$people'>$i</a></li>";
          }else{
            echo "<li><a href='/lesuirely/php_pages/book.php?page=$i&tag=$tag&people=$people'>$i</a></li>";
          }
        }
        ?>
      </ul>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
