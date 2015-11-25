<?php
ini_set('display_errors', 'On');

function getMovies(&$itempage){
  $connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
  if($connection->connect_errno){
    echo "Failed to connect to Mysql";
    exit();
  }
  $stmt = "SELECT id, imgurl, title, year
   FROM     movie
   WHERE    id>=$itempage
   AND      id<$itempage+50";
   $result = $connection->query($stmt);

   $encode = array();

while($row = mysqli_fetch_assoc($result)) {
   $encode[] = $row;
}
  $itempage+=50;
  return json_encode($encode);
}

function getBooks(&$itempage){
  $connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
  if($connection->connect_errno){
    echo "Failed to connect to Mysql";
    exit();
  }
  $stmt = "SELECT id, imgurl, title
   FROM     book
   WHERE    id>=$itempage
   AND      id<$itempage+40";
   $result = $connection->query($stmt);

   $encode = array();

while($row = mysqli_fetch_assoc($result)) {
   $encode[] = $row;
}
  $itempage+=40;
  return json_encode($encode);
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
  $items = unserialize($_SESSION['items']);
  $quantity=0;
  if($items){
  foreach($items as $key ){
    if($key->ptype=='Buy'){
    $quantity+=$key->quantity;
  }else{
    $quantity+=1;
  }
  }
}
return $quantity;
}
 ?>
