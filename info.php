<?php
ini_set('display_errors', 'On');
//session_start();

$connection = mysqli_connect("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
if(mysqli_connect_errno()){
  echo "Failed to connect to Mysql";
}

// if(isset($_SESSION['user'])){
//     $user= $_SESSION['user'];
// }

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username']; 
$email=$_POST['emailaddress'];
$phone=$_POST['phonenumber'];
$password=sha1($_POST['password']);
$addressfirst = $_POST['addressfirst'];
$addresssecond = $_POST['addresssecond'];
$city = $_POST['city']; 
$state=$_POST['state1'];
$country=$_POST['country1'];
$zipcode=$_POST['zipcode'];

$userId = mysqli_query($connection, "SELECT * from usr WHERE name = '$username'");
$row = mysqli_fetch_row($userId);
// return $row[0];
$id = $row[0];

$resultInUserName = mysqli_query($connection, "UPDATE usr SET fname = '$firstname', lname = '$lastname', name = '$username', email='$email', password = '$password' WHERE id = '$id'");
if($resultInUserName){
	echo "success";
}
else{
	echo "error";
}

$addressBook = mysqli_query($connection, "SELECT * FROM address where userId = '$id'");
$addressRow = mysqli_num_rows($addressBook);
if($addressRow == 0){
 $query=mysqli_query($connection, "INSERT INTO address(userId, address1, address2, city, state, country, zip, phone) VALUES ('$id', '$addressfirst', '$addresssecond', '$city', '$state', '$country', '$zipcode', '$phone')");
 if($query){
 	echo "success";
 }
 else{
 	echo "error";
 }
}
else{
 $query=mysqli_query($connection, "UPDATE address SET address1='$addressfirst', address2='$addresssecond', city='$city', state='$state', country='$country', zip='$zipcode', phone='$phone' WHERE userId = '$id'");
 if($query){
 	echo "success";
 }
 else{
 	echo "error";
 }
}

mysqli_close($connection);
?>