<?php
// ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************
session_start();
require_once('func.php');

if(isset($_POST['title'])){
  $t=$_POST['title'];
 if(isset($_SESSION['items'])&& (!empty($_SESSION['items']))){
   $items = unserialize($_SESSION['items']);
   foreach($items as $item){
     $x=$item->title;
     if(strcasecmp($x, $t)==0){
       $item->quantity=$_POST['qty'];
     }
   }
   $_SESSION['items']=serialize($items);
 }
 echo 'success';
}
else{
  $cat=$_POST['category'];
  $id= $_POST['id'];
  $items = unserialize($_SESSION['items']);
  $new=array();
  foreach($items as $itemKey =>$item){
    if((trim($item->id)==$id) &&(trim($item->ctype)==$cat)){
      continue;
    }else{
      array_push($new, $item);
    }
  }
  $_SESSION['items']='';
  $_SESSION['items']=serialize($new);
}
 ?>
