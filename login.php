<?php
$connection = mysql_connect("localhost", "root", "root"); // Establishing connection with server..
$db = mysql_select_db("Leisurely", $connection); // Selecting Database.
$name=$_POST['name']; // Fetching Values from URL.
$password= sha1($_POST['pwd']); // Password Encryption, If you like you can also leave sha1.

$result = mysql_query("SELECT * FROM usr WHERE name='$name'");
$data = mysql_num_rows($result);
console.log($data);
if(($data)==0){
  echo "User name incorrect!";
}else{
  $result = mysql_query("SELECT * FROM usr WHERE name='$name' and password='$password'");
  $data = mysql_num_rows($result);
if(($data)==1){
  echo "Success";
}else{
  echo "Password incorrect!";
}
}
mysql_close ($connection);
?>
