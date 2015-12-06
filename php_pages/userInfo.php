<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
$pageTitle = 'lesuirely | User Details';
include 'header.php';
?>

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
<?php include 'footer.php'; ?>
