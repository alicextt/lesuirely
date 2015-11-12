<!DocType html>
<html>
<head>
  <title>
    Sign In
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src = "event.js" text = "text/javascript" language = "javascript"></script>
  <link href="styles.css" rel="stylesheet">
</head>

<?php 
error_reporting(0);
$email_val="";
$anemail_val="";

$done=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//echo $_POST["visitorname"];
		
		$email = $_POST["visitoremail"];
		$anemail = $_POST["anothervisitoremail"];
	
		
		
		if($email==""){
		$email_val="*No Email address entered";
		}else{

		$okay = preg_match(
        '/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email
);
		if(!$okay){
		$email_val="*Email address is in any format other than abc@xyz.com";
		$done=0;
		}else{
		$done2=1;
		}

		}
		if($anemail==""){
		$anemail_val="*NO Password entered";
		}else{
	if($okay1 =ctype_alnum($anemail) // numbers & digits only 
        && strlen($anemail)>6 // at least 7 chars 
        && strlen($anemail)<21 // at most 20 chars 
        && preg_match('`[A-Z]`',$anemail) // at least one upper case 
        && preg_match('`[a-z]`',$anemail) // at least one lower case 
        && preg_match('`[0-9]`',$anemail) // at least one digit 
        )
 {
			$done3=1;
     }
else{
  $anemail_val="*password for length between(6,21),at least     contains  1-uppercase, 1-lowercase and 1-numbers.";
		
		$done=0;
		}
		
		}
		


		 
}



?>
 ?>

<body>
  <!-- header-->
  <noscript> Browser does not support JAVASCRIPT</noscript>
  <header class="container">
    <div class="horizontal">
      <ul>
        <li><a href="homepage.html"><img src="logo.png" alt="leisurely" height="110"
          width="125"></li></a>
          <li><a href="moviePage.html">Movies</a></li>
          <li><a href="#">Books</a></li>
          <li>
            <form accept-charset="utf-8" class="nav-search" method="GET" name="site-search" action="search.php">
              <div>
                <button class="glyphicon glyphicon-search" id="nav-search-con" type="Submit"/>
              </div>
              <div class="nav-fill">
                <input placeholder="Search" autocomplete="off" name="search" type="text">
              </div>
            </form>
          </li>
         <li><a id = "signup" href = "signUp.html">Join Today</a></li>
          <li><a id = "sign" href = "login.php">Sign In</a></li>
          <li><a href=""><img src="cart.png" alt="Lesuirely" height="50" width="50"></a></li>
        </ul>
      </div>
    </header>
    <div class="right">
      <center><legend>Login Now!</legend></center>
    

<?php echo $image_uploaded;?>
<form action = "index.php" method= "POST" name="form1" id="form1" enctype="multipart/form-data"> 
<input type="hidden" name="to" value="YOUREMAIL@YOURDOMAIN.COM">
<input type="hidden" name="from" value="YOUREMAIL@YOURDOMAIN.COM">
<input type="hidden" name="subject" value="EMAIL SUBJECT LINE">
<input type="hidden" name="returnurl" value="HTTP://YOURDOMAIN.COM/FULL_URL_TO_THANK_YOU.HTML">
<input type="hidden" name="notefields" value="Name:~~visitorname~~<BR><BR>E-Mail:~~visitoremail~~<BR><BR>Comments:~~comments~~<BR>">



          
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email"
name="visitoremail" value="<?php echo $email;?>"><?php if($email_val){echo $email_val;}?>
<div class="error" id="mailerror"></div>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="anothervisitoremail" value="<?php echo $anemail;?>"><?php if($anemail_val){echo $anemail_val;}?><div class="error" id="pwderror"></div>
          </div>
          
          <div class="center">
        <button class="btn btn-warning" type="button" id="submit">Submit</button>
      </div>
    </form>
</div>
</body>


</html>
