<?php
//-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************
ini_set('display_errors', 'On');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$connection = mysqli_connect("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
if(mysqli_connect_errno()){
  echo "Failed to connect to Mysql";
}

$fname = $_POST['fname1'];
$lname = $_POST['lname1'];
$name = $_POST['name1']; // Fetching Values from URL.
$email=$_POST['email1'];

$password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.

// Check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  echo "Invalid Email.......";
}else{
  $result = mysqli_query($connection, "SELECT * FROM usr WHERE name = '$name'");
  $data = mysqli_num_rows($result);
  if(($data)==0){
    $query = mysqli_query($connection, "INSERT INTO usr(fname, lname, name, email, password) values ('$fname', '$lname', '$name', '$email', '$password')"); // Insert query
    if($query){
      if(isset($_SESSION['items'])){
        $items = base64_encode($_SESSION['items']);
        $stmt= "select id from usr where name='$name'";
        $result = $connection->query($stmt);
        $row = mysqli_fetch_assoc($result);
        $id= $row['id'];
        
        $stmt= "select id from sessions where id=$id";
        $result = $connection->query($stmt);
        if(mysqli_num_rows($result)==0){
          $stmt="insert into sessions(id, access, data) values ('$id', now(), '$items')";
        }else{
          $stmt = "update sessions set data = '$items', access=now() where id='$id'";
        }
        $result = $connection->query($stmt);
      }
      echo "Success";
    }else
    {
	  echo "INSERT INTO usr(fname, lname, name, email, password) values ('$fname', '$lname', $name', '$email', '$password')"; // Insert query
      echo "Error....!!";
    }
  }else{
    echo "User name taken";
  }
}
mysqli_close ($connection);
?>
