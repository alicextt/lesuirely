<?php
$connection = mysql_connect("localhost", "root", "root"); // Establishing connection with server..
$db = mysql_select_db("Leisurely", $connection); // Selecting Database.
$name=$_POST['name1']; // Fetching Values from URL.
$email=$_POST['email1'];
$password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
// Check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  echo "Invalid Email.......";
}else{
  $result = mysql_query("SELECT * FROM usr WHERE email='$email'");
  $data = mysql_num_rows($result);
  console.log($data);
  if(($data)==0){
    $query = mysql_query("insert into usr(name, email, password) values ('$name', '$email', '$password')"); // Insert query
    if($query){
      echo "Success";
    }else
    {
      echo "Error....!!";
    }
  }else{
    echo "This email is already registered, Please try another email...";
  }
}
mysql_close ($connection);
?>
