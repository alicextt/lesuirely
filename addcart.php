<?php
// ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************

session_start();
require_once('func.php');

$newItem=new pitem($_POST['id'], $_POST['ptype'],$_POST['ctype'], $_POST['uprice'],$_POST['quantity'], $_POST['title'], $_POST['img']);

$items=array();
if(isset($_SESSION['items'])&& (!empty($_SESSION['items']))){
  $items = unserialize($_SESSION['items']);
  array_push($items, $newItem);
  $_SESSION['items']=serialize($items);
}else{
  array_push($items, $newItem);
  $_SESSION['items']=serialize($items);
}
echo 'success';
?>
