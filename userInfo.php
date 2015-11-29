
<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<!DocType html>

<html>
<head>
  <title>
    Leisurely | User Details
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src = "event.js" text = "text/javascript" language = "javascript"></script>
  <link href="styles.css" rel="stylesheet">
</head>
<body onload="getDate()">
    <!-- header-->
  <noscript> Browser does not support JAVASCRIPT</noscript>
  <header class="container">
    <div class="horizontal">
      <ul>
        <li><a href="index.php"><img src="logo.png" alt="leisurely" height="110"
          width="125"></li></a>
          <li><a href="movie.php">Movies</a></li>
          <li><a href="book.php">Books</a></li>
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
          <?php  if(!isset($_SESSION['user'])){
            ?>
            <li><a id = "signup" href = "signup.html">Join Today</a></li>
            <li><a id = "sign" href="login.html">Sign In</a></li>
            <?php
          }else{
            ?>
            <li><a id = "signup" href = "userIno.html">Info</a></li>
            <li><a id = "sigout" href="logout.html">Logout</a></li>
            <?php
          }
          ?>
          <li><a href="checkout.html"><img src="cart.png" alt="Lesuirely" height="50" width="50"></a></li>
        </ul>
      </div>
    </header>
    <div>
    <div class="right" id="form">
      <legend>View/Edit Personal Info</legend>
    <form accept-charset="UTF-8" action="#" method="post">
          <div class = "error" id = "userInfoError"></div>
          <div class="error" id="passerror"></div>
          <div class="userinfo">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname"/><div class="error" id="fnameError"></div>
          </div>
          <div class="userinfo">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname"/><div class="error" id="lnameError"></div>
          </div>
          <div class="userinfo">
            <label for="usr">User Name:</label>
            <input type="text" class="form-control" id="usr"/><div class="error" id="usrerror"></div>
          </div>
          <div class="userinfo">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email"/><div class="error" id="mailerror"></div>
          </div>
          <div class="userinfo">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd"/><div class="error" id="pwderror"></div>
          </div>
          <div class="userinfo">
            <label for="cpwd">Confirm Password:</label>
            <input type="password" class="form-control" id="cpwd"/><div class="error" id="cpwderror"></div>
          </div>
          <div class="userinfo">
            <label for="cpwd">Phone number:</label>
            <input type="number" class="form-control" id="phone"/><div class="error" id="phoneerror"></div>
          </div>
          <div class="userinfo">
            <label for="address">Address Line 1:</label>
            <input type="text" class="form-control" id="address1"/><div class="error" id="adderror1"></div>
          </div>
          <div class="userinfo">
            <label for="address">Address Line 2:</label>
            <input type="text" class="form-control" id="address2"/><div class="error" id="adderror2"></div>
          </div>
          <div class="userinfo">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city"/><div class="error" id="cityerror"></div>
          </div>
          <div class="userinfo">
            <label for="usr">State:</label>
            <!-- <input type="text" class="form-control" id="usr"/><div class="error" id="usrerror"></div> -->
            <select class="form-control" id="state">
                <option value=" ">Select a State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
              </select>
              <div class="error" id="stateerror">
          </div>
          <div class="userinfo">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country"/><div class="error" id="countryerror"></div>
          </div>
          <div class="userinfo">
            <label for="num">Zip Code:</label>
            <input type="number" class="form-control" id="zip"/><div class="error" id="ziperror"></div>
          </div>
          <div class="center">
        <button class="btn btn-warning" type="button" id="changes" onclick = "editInfoClick()">Confirm Changes</button>
      </div>
    </form>
</div>
</div>
<div id="copycont">
  <footer>
      <p class="center"> Copyright@2015, designed by <a class="yellow">Leisurely Admin | Privacy Policy</a></p>
      <p class="center">  Site Last Modified:
        <span id="lastModified"/> </p>
        <noscript> Browser does not support JAVASCRIPT</noscript>
      </footer>
</div>
</body>
</html>
