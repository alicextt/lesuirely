<?php
// ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('func.php');

$items=array();
if(isset($_SESSION['items'])&& (!empty($_SESSION['items']))){
  $items = unserialize($_SESSION['items']);
}
$addressId= $_POST['ship'];
$paymentId=$_POST['card'];
$userId=$_SESSION['id'];
$shipping= $_POST['delievery'];

$connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
if($connection->connect_errno){
  echo "Failed to connect to Mysql";
  exit();
}

mysqli_query($connection, 'SET CHARACTER SET utf8');

// this will insert the purchase info into PI table
$stmt = "INSERT INTO purchaseInfo(userId, addressId, paymentId, purchasedate, status, shipping)
values ('$userId', '$addressId', '$paymentId', now(), 'In Transit', '$shipping')";
$result = $connection->query($stmt);
if(!$result){
  echo "Error at insert purchase info....!!";
  return;
}

$stmt = "select purchaseId from purchaseInfo order by purchaseId desc limit 1";
$result = $connection->query($stmt);
$row = mysqli_fetch_assoc($result);
$po =$row['purchaseId'];

// save data into purchase Detail
foreach ($items as $key) {
  $category = trim($key->ctype);
  $catid = $key->id;
  $type =trim($key->ptype);
  $qty = $key->quantity;
  $stmt = "INSERT INTO purchaseDetail(purchaseId, category, catid, type, qty)
  values ('$po', '$category', '$catid', '$type', '$qty')";
  $result = $connection->query($stmt);
  if(!$result){
    echo "Error at insert into purchase detail....!!";
    return;
  }
}
$_SESSION['items']='';
echo 'success';

?>
