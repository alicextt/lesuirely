<?php
// ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************
session_start();
require_once('func.php');
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

 ?>
