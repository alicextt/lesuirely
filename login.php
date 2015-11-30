<?php
//<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
ini_set('display_errors', 'On');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$connection = mysqli_connect("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
if(mysqli_connect_errno()){
  echo "Failed to connect to Mysql";
}

$name=$_POST['name']; // Fetching Values from URL.
$password= sha1($_POST['pwd']); // Password Encryption, If you like you can also leave sha1.

$result = mysqli_query($connection, "SELECT * FROM usr WHERE name='$name'");
$data = mysqli_num_rows($result);

if(($data)==0){
  echo "User name incorrect!";
}else{
  $result = mysqli_query($connection, "SELECT * FROM usr WHERE name='$name' and password='$password'");
  $data = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
	if(($data)==1){
	  $_SESSION['user']=$name;
    $_SESSION['id']= $row['id'];
    $id=$row['id'];
    //restore last session items
    $stmt="select * from sessions where id='$id'";
    $result = $connection->query($stmt);
    $row = mysqli_fetch_assoc($result);
    $retrieved_value = base64_decode($row['data']);
    $_SESSION['items']=$retrieved_value;
	  echo "Success";
	}else{
	  echo "Password incorrect!";
	}
}

mysqli_close ($connection);
?>
