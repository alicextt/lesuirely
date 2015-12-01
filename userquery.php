<?php
//********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 'On');
include("func.php");
// echo $_SESSION['id'].'  '.$_GET['address'];

$number=$_GET['address'];

$connection = new mysqli("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
if($connection->connect_errno){
  echo "Failed to connect to Mysql";
  exit();
}
$stmt = "select * from address where addressId=$number";

mysqli_query($connection, 'SET CHARACTER SET utf8');
$result = $connection->query($stmt);
$encode = array();

$row = mysqli_fetch_assoc($result);

header('Content-Type: application/json');
echo json_encode($row);

?>
