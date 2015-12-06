<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
$pageTitle = 'lesuirely | Homepage';
include 'header.php';
?>

<div class="vuser">
  <?php
  if(isset($_SESSION['user'])){
    $user= $_SESSION['user'];
    echo "<h1>$user, Welcome Back!</h1>";
  }
  ?>
  <div class="slide">
    <div class="slider_wrapper">
      <ul id="image_slider">
        <li><a href="itemdetail.php?id=1&cat=movie"><img src="/lesuirely/images/1.jpg"></a></li>
        <li><a href="itemdetail.php?id=39&cat=book"><img src="/lesuirely/images/2.jpg"></a></li>
        <li><a href="itemdetail.php?id=295&cat=movie"><img src="/lesuirely/images/3.jpg"></a></li>
        <li><a href="itemdetail.php?id=82&cat=book">  <img src="/lesuirely/images/4.jpg"></a></li>
      </ul>
      <span class="nvgt" id="prev"></span>
      <span class="nvgt" id="next"></span>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
