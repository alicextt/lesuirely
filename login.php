<?php
ini_set('display_errors', 'On');
session_start();

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
	if(($data)==1){
	  $_SESSION['user']=$name;
	  echo "Success";
	}else{
	  echo "Password incorrect!";
	}
}
mysqli_close ($connection);
?>
