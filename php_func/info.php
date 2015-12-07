<?php
//********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-

ini_set('display_errors', 'On');
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$connection = mysqli_connect("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
if(mysqli_connect_errno()){
  echo "Failed to connect to Mysql";
}

$id=$_SESSION['id'];

if(isset($_POST['username'])){
  $username = $_POST['username'];
  $email=$_POST['emailaddress'];
  $phone=$_POST['phonenumber'];
  $password=sha1($_POST['password']);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $resultInUserName = mysqli_query($connection, "UPDATE usr SET fname = '$firstname', lname = '$lastname', name = '$username', email='$email', password = '$password' WHERE id = '$id'");
  if(!$resultInUserName){
    echo "error";
    return;
  }
}

// insert new address
if(isset($_POST['addressfirst'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $addressfirst = $_POST['addressfirst'];
  $addresssecond = $_POST['addresssecond'];
  $phone=$_POST['phonenumber'];
  $city = $_POST['city1'];
  $state=$_POST['state1'];
  $country=$_POST['country1'];
  $zipcode=$_POST['zipcode'];
  $person= $firstname.' '.$lastname;

  $query=mysqli_query($connection, "INSERT INTO address(userId,person, address1, address2, city, state, country, zip, phone) VALUES ('$id','$person', '$addressfirst', '$addresssecond', '$city', '$state', '$country', '$zipcode', '$phone')");
  if(!$query){
    echo "error";
  }
  $query = mysqli_query($connection, "SELECT addressId FROM address WHERE userId='$id' AND address1='$addressfirst' AND address2='$addresssecond' AND person='$person'");
  $row=mysqli_fetch_assoc($query);
  echo $row['addressId'];
  echo ' ';

}
// insert new credit card
if(isset($_POST['cardno'])){
  $card = $_POST['card'];
  $name= $_POST['name'];
  $cardno = $_POST['cardno'];
  $validdate= $_POST['validdate'];
  $cvv=$_POST['cvv'];

  $query=mysqli_query($connection, "INSERT INTO payment(userId,cardType, nameOnCard, creditCardNumber, cvv, expiryDate) VALUES ('$id','$card','$name', '$cardno', '$cvv', '$validdate')");
  if(!$query){
    echo "error";
  }
  $query = mysqli_query($connection, "SELECT paymentId FROM payment WHERE userId='$id' AND creditCardNumber='$cardno'");
  $row=mysqli_fetch_assoc($query);
  echo $row['paymentId'];
  echo ' ';
}

echo'Success';

mysqli_close($connection);
?>
