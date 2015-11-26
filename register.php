<?php
ini_set('display_errors', 'On');

$connection = mysqli_connect("localhost", "root", "root", "Leisurely"); // Establishing connection with server..
if(mysqli_connect_errno()){
  echo "Failed to connect to Mysql";
}

$fname = $_POST['fname1'];
$lname = $_POST['lname1'];
$name = $_POST['name1']; // Fetching Values from URL.
$email=$_POST['email1'];
//Pooja,Allan,Shubham,Tingting
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
      echo "Success";
    }else
    {
	echo "INSERT INTO usr(fname, lname, name, email, password) values ('$fname', '$lname', $name', '$email', '$password')"; // Insert query
      echo "Error....!!";
    }
  }else{
    echo "This user name is already registered, Please try another user name...";
  }
}
mysqli_close ($connection);
?>
