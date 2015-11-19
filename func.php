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
  $itempage+=30;
  return json_encode($encode);
}

 ?>
