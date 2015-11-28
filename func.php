<?php
//********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 'On');

function getData($stmt){
  $connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
  if($connection->connect_errno){
    echo "Failed to connect to Mysql";
    exit();
  }
  mysqli_query($connection, 'SET CHARACTER SET utf8');
  $result = $connection->query($stmt);
  $encode = array();
  while($row = mysqli_fetch_assoc($result)) {
    $encode[] = $row;
  }
  return json_encode($encode);
}

function getMovies(&$itempage, &$tag, &$people){
  if(!empty($_GET['tag'])){
    $tag=$_GET['tag'];
  }
  if(!empty($_GET['people'])){
    $people=$_GET['people'];
  }
  if(!empty($_GET['page'])){
    $itempage=(int)$_GET['page'];
  }
  if(empty($tag) && empty($people)){
    $min = ($itempage-1)*50;
    $max = $itempage*50;
    $stmt = "SELECT id, imgurl, title, year
    FROM     movie
    WHERE    id>$min
    AND      id<=$max";
  }else if(empty($people)){
    $num=($itempage-1)*50;
    $stmt = "SELECT id, imgurl, title, year
    FROM     movie
    WHERE   tags like '%$tag%' order by id limit $num, 50";
  }else{
    $num=($itempage-1)*50;
    $stmt = "SELECT id, imgurl, title, year
    FROM     movie
    WHERE   stars like '%$people%' order by id limit $num, 50";
  }
  $itempage+=1;
  return getData($stmt);
}

function getMaxid($table, $tag, $people){
  $connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
  if($connection->connect_errno){
    echo "Failed to connect to Mysql";
    exit();
  }
  mysqli_query($connection, 'SET CHARACTER SET utf8');
  if(!empty($tag)){
    $stmt = "SELECT count(*) from $table where tags like '%$tag%' ";
  }else{
    if($table=='book'){
      $stmt = "SELECT count(*) from $table where author like '%$people%' ";
    }else{
      $stmt = "SELECT count(*) from $table where stars like '%$people%' ";
    }
  }
  $result = $connection->query($stmt);
  $row = mysqli_fetch_row($result);
  return $row[0];
}

function getSearchMaxid($search){
  $connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
  if($connection->connect_errno){
    echo "Failed to connect to Mysql";
    exit();
  }
  mysqli_query($connection, 'SET CHARACTER SET utf8');
  $stmt = "select count(*) from movie
  where title like '%$search%' or year like '%$search%'
  or description like '%$search%' or tags like '%$search%' or stars like '%$search%'";
  $result = $connection->query($stmt);
  $row = mysqli_fetch_row($result);
  $max=$row[0];

  $stmt = "select count(*) from book where title like '%$search%'
  or description like '%$search%' or tags like '%$search%' or author like '%$search%'";
  $result = $connection->query($stmt);
  $row = mysqli_fetch_row($result);

  if($max<$row[0])
  {
    $max=$row[0];
  }
  return $max;
}

function getBooks(&$itempage, &$tag, &$people){
  if(!empty($_GET['tag'])){
    $tag=$_GET['tag'];
  }
  if(!empty($_GET['people'])){
    $people=$_GET['people'];
  }
  if(!empty($_GET['page'])){
    $itempage=(int)$_GET['page'];
  }

  if(empty($tag) && empty($people)){
    $min = ($itempage-1)*40;
    $max = $itempage*40;
    $stmt = "SELECT id, imgurl, title
    FROM     book
    WHERE    id>$min
    AND      id<=$max";
  }else if(empty($people)){
    $num=($itempage-1)*40;
    $stmt = "SELECT id, imgurl, title
    FROM     book
    WHERE   tags like '%$tag%' order by id limit $num, 40";
  }else{
    $num=($itempage-1)*50;
    $stmt = "SELECT id, imgurl, title
    FROM     book
    WHERE   author like '%$people%' order by id limit $num, 40";
  }
  $itempage+=1;
  return getData($stmt);
}

function getitembyid($category, $id){
  $connection = mysqli_connect("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
  if(mysqli_connect_errno()){
    echo "Failed to connect to Mysql";
  }
  mysqli_query($connection, 'SET CHARACTER SET utf8');
  $result = mysqli_query($connection, "SELECT * FROM $category WHERE id='$id'");
  $data = mysqli_fetch_assoc($result);
  return json_encode($data);
}


class pitem{
  // purchase type either buy or rent
  var $ptype;
  // item type, either book or movie
  var $ctype;
  // unit price;
  var $uprice;
  // purchase quantity
  var $quantity;
  // item name
  var $title;
  // img url;
  var $img;

  //item id
  var $id;

  public function __construct($id, $ptype, $ctype, $uprice, $quantity, $title, $img){
    $this->id=$id;
    $this->ptype =$ptype;
    $this->ctype =$ctype;
    $this->uprice =$uprice;
    $this->quantity =$quantity;
    $this->title =$title;
    $this->img = $img;
  }
}

function getCartItemQuantity(){
  $quantity=0;
  if(!empty($_SESSION['items'])){
    $items = unserialize($_SESSION['items']);
    if($items){
      foreach($items as $key ){
        if($key->ptype=='Buy'){
          $quantity+=$key->quantity;
        }else{
          $quantity+=1;
        }
      }
    }
  }
  return $quantity;
}

function getPurchasedItem(){
  $items='';
  if(!empty($_SESSION['items'])){
    $items = unserialize($_SESSION['items']);
    }
  return $items;
}

function searchMovie(&$search, &$itempage, &$maxid){
  if(!empty($_GET['search'])){
    $search=$_GET['search'];
  }
  if(!empty($_GET['page'])){
    $itempage=(int)$_GET['page'];
  }
  $num=($itempage-1)*40;
  $stmt = "select * from movie
  where title like '%$search%' or year like '%$search%'
  or description like '%$search%' or tags like '%$search%' or stars like '%$search%' order by id limit $num, 40";
  $itempage+=1;

  $maxid=getSearchMaxid($search);

  return getData($stmt);
}

function searchBook(&$search, &$itempage){
  $num=($itempage-1)*40;
  $stmt = "select * from book where title like '%$search%'
  or description like '%$search%' or tags like '%$search%' or author like '%$search%' order by id limit $num, 40";
  return getData($stmt);
}

function saveSession(){
    if(!isset($_SESSION['items'])){
      return;
    }
    $items = base64_encode($_SESSION['items']);
    $id=$_SESSION['id'];
    $connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
    if($connection->connect_errno){
      echo "Failed to connect to Mysql";
      exit();
    }
    mysqli_query($connection, 'SET CHARACTER SET utf8');
    $stmt= "select id from sessions where id=$id";
    $result = $connection->query($stmt);

    $access=time();
    if(mysqli_num_rows($result)==0){
      $stmt="insert into sessions(id, access, data) values ('$id', '$access', '$items')";
    }else{
      $stmt = "update sessions set data = '$items' where id='$id'";
    }
    $result = $connection->query($stmt);
    if(mysql_errno()){
    echo "MySQL error ".mysql_errno().": "
         .mysql_error()."\n<br>When executing <br>\n$stmt\n<br>";
    }
}

?>
