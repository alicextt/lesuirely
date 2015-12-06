<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
$pageTitle = 'lesuirely | Movies';
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
        <a href="movie.php?tag=action">Action</a>
      </li>
      <li>
        <a href="movie.php?tag=sci-fi">Sci-Fi</a>
      </li>
      <li>
        <a href="movie.php?tag=comedy">Comedy</a>
      </li>
      <li>
        <a href="movie.php?tag=drama">Drama</a>
      </li>
      <li>
        <a href="movie.php?tag=Adventure">Adventure</a>
      </li>
      <li>
        <a href="movie.php?tag=Thriller">Thriller</a>
      </li>
      <li>
        <a href="movie.php">All Categories</a>
      </li>
    </ul>
  </div>
  <div class="right">
    <?php
    $itempage=1;
    $tag='';
    $people='';
    $jsonData=getMovies($itempage, $tag, $people);
    $json = json_decode($jsonData);
    ?>

    <table>
      <tr class="movie">
        <?php
        $count=0;
        for($i=0;$i<count($json);$i++){
          $data= $json[$i];
          if($count<5){
            $count++;
            ?>
            <td class="item"><div class="center"><img src = "<?=$data->imgurl?>"><h4><a name="<?=$data->id?>" href="itemdetail.php?id=<?=$data->id?>&cat=movie"><?=$data->title?> <span>(<?=$data->year?>)</span></a></h4></div></td>
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
        $max =getMaxid('movie', $tag, $people);
        for($i=1;$i<$max/50+1;$i++){
          if($i==$itempage-1){
            echo "<li class='active'><a href='movie.php?page=$i&tag=$tag&people=$people'>$i</a></li>";
          }else{
            echo "<li><a href='movie.php?page=$i&tag=$tag&people=$people'>$i</a></li>";
          }
        }
        ?>
      </ul>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
