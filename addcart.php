<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php

require_once('func.php');
session_start();

$newItem=new pitem($_POST['ptype'],$_POST['ctype'], $_POST['uprice'],$_POST['quantity'], $_POST['title']);
var_dump((array)$newItem);
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
