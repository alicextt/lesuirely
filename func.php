<?php
//********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************

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

  public function __construct($ptype, $ctype, $uprice, $quantity, $title, $img){
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

?>
