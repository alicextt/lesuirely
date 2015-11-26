<?php
ini_set('display_errors', 'On');

function getMovies(&$itempage, $tag){
  $connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
  if($connection->connect_errno){
    echo "Failed to connect to Mysql";
    exit();
  }
  mysqli_query($connection, 'SET CHARACTER SET utf8');

  if(empty($tag)){
  $min = ($itempage-1)*50;
  $max = $itempage*50;
  $stmt = "SELECT id, imgurl, title, year
  FROM     movie
  WHERE    id>$min
  AND      id<=$max";
  $result = $connection->query($stmt);

  $encode = array();

  while($row = mysqli_fetch_assoc($result)) {
    $encode[] = $row;
  }
  $itempage+=1;
  return json_encode($encode);
}else{
  $num=($itempage-1)*50;
  $stmt = "SELECT id, imgurl, title, year
  FROM     movie
  WHERE   tags like '%$tag%' order by id limit $num, 50";
  $result = $connection->query($stmt);

  $encode = array();
  while($row = mysqli_fetch_assoc($result)) {
    $encode[] = $row;
  }
  $itempage+=1;
  return json_encode($encode);
 }
}

function getMaxid($table, $tag){
  $connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
  if($connection->connect_errno){
    echo "Failed to connect to Mysql";
    exit();
  }
  mysqli_query($connection, 'SET CHARACTER SET utf8');

  $stmt = "SELECT count(*) from $table where tags like '%$tag%' ";
  $result = $connection->query($stmt);
  $row = mysqli_fetch_row($result);
  return $row[0];
}

function getBooks(&$itempage, $tag){
  $connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
  if($connection->connect_errno){
    echo "Failed to connect to Mysql";
    exit();
  }
  mysqli_query($connection, 'SET CHARACTER SET utf8');

  if(empty($tag)){
  $min = ($itempage-1)*40;
  $max = $itempage*40;
  $stmt = "SELECT id, imgurl, title
  FROM     book
  WHERE    id>$min
  AND      id<=$max";
  $result = $connection->query($stmt);

  $encode = array();

  while($row = mysqli_fetch_assoc($result)) {
    $encode[] = $row;
  }
  $itempage+=1;
  return json_encode($encode);
}else{
  $num=($itempage-1)*40;
  $stmt = "SELECT id, imgurl, title
  FROM     book
  WHERE   tags like '%$tag%' order by id limit $num, 40";
  $result = $connection->query($stmt);

  $encode = array();
  while($row = mysqli_fetch_assoc($result)) {
    $encode[] = $row;
  }
  $itempage+=1;
  return json_encode($encode);
 }
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

  public function __construct($ptype, $ctype, $uprice, $quantity, $title){
    $this->ptype =$ptype;
    $this->ctype =$ctype;
    $this->uprice =$uprice;
    $this->quantity =$quantity;
    $this->title =$title;
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
?>
