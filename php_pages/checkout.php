<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 'On');
include("../php_func/func.php");
?>

<!DocType html>

<html>
<head>
  <title>
    Leisurely | Checkout
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src = "/lesuirely/js/event.js" type = "text/javascript"></script>
  <script src = "/lesuirely/js/item.js" type = "text/javascript"></script>

  <link href="/lesuirely/css/styles.css" rel="stylesheet">
</head>
<body class = "checkout">
  <!-- header-->
  <noscript> Browser does not support JAVASCRIPT</noscript>
  <header class="checkout">
    <a href="/lesuirely/php_pages/index.php" ><img src = "/lesuirely/images/logo.png" alt="logo" height="150" width="150"></a>
  </header>
  <div class="box">
    <fieldset>
      <legend>Checkout</legend>
      <div class="accordion_container">
        <?php
        if(!isset($_SESSION['id'])){
          ?>
          <div class="accordion_head">Customer<span class="plusminus">+</span></div>
          <div class="accordion_body">
            <div class ="form1">
              <ul>
                <li>
                  <div class="inner_accordion_head">Returning Customer<span class="plusminus1">+</span></div>
                  <div class="inner_accordion_body">
                    <p>Sign-in for easy checkout.</p>
                    <form accept-charset="UTF-8" action="#" method="post">
                      <div class="form-group">
                        <label for="usr">User Name:</label>
                        <input type="text" class="form-control" id="usr"/><div class="error" id="usrerror"></div>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd"/><div class="error" id="pwderror"></div>
                      </div>
                      <a href="#">Forgot Username/Password?</a>
                      <div class="btn-left">
                        <button class="cbtn" type="button" id="register">Sign in</button>
                      </div>
                    </form>
                  </div>
                </li>

                <li>
                  <div class="inner_accordion_head">Guest and New Customer<span class="plusminus1">+</span></div>
                  <div class="inner_accordion_body">
                    <p>Please enter your email address.</p>
                    <form accept-charset="UTF-8" action="#" method="post">
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" id="email"/><div class="error" id="mailerror"></div>
                      </div>
                      <div class="btn-left">
                        <button class="next" type="button">Next</button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <?php
          }
          ?>

          <div class="accordion_head" name='shipping'>Shipping<span class="plusminus">+</span></div>
          <div class="accordion_body" id="checkout1">
            <div class="form1">
              <div class="form-group">
                <label for="usraddress">Choose one address:</label>
                <select class="form-control" id="usraddress">
                  <option value="*">Enter a new address:</option>
                  <?php
                  $addreses = getUserAddressByid('');
                  $array = json_decode($addreses);
                  if(is_array($array)){
                    foreach($array as $key){
                      $addId = $key->addressId;
                      $s = 'To: '.$key ->person;
                      $s = $s.', '.$key->address1.', '.$key->address2;
                      echo "<option value='$addId'>$s</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <!--  <form accept-charset="UTF-8" action="#" method="post"> -->
              <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname"/><div class="error" id="fnerror"></div>
              </div>
              <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" id="lname"/><div class="error" id="lnerror"></div>
              </div>
              <div class="form-group">
                <label>Company:</label>
                <input type="text" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="address">Address Line 1:</label>
                <input type="text" class="form-control" id="address1"/><div class="error" id="adderror"></div>
              </div>
              <div class="form-group">
                <label for="address">Address Line 2:</label>
                <input type="text" class="form-control" id="address2"/>
              </div>
              <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city"/><div class="error" id="cityerror"></div>
              </div>
              <div class="form-group">
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
                <div class="error" id="staterror"></div>
              </div>
              <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country"/><div class="error" id="countryerror"></div>
              </div>
              <div class="form-group">
                <label for="num">Zip Code:</label>
                <input type="number" class="form-control" id="zip"/><div class="error" id="ziperror"></div>
              </div>
              <div class="form-group">
                <label for="num">Phone:</label>
                <input type="number" class="form-control" id="phone"/><div class="error" id="phonerror"></div>
              </div>

              <div class="form-group">
                <label>Delivery: </label>
                <div class="radio">
                  <label><input type="radio" name="option" checked>7-9 business days (Free Shipping on Orders over $35.0<span class='shipprice'>0</span>)</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="option">3-5 business days - $<span class='shipprice'>7.00</span></label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="option">2 business days - $<span class='shipprice'>17.00</span></label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="option">1 business day - $<span classs='shipprice'>22.00</span></label>
                </div>
              </div>
              <div class="btn-left">
                <button class="nextbutton" type="button">Next</button>
              </div>
            </div>
          </div>

          <div class="accordion_head">Gift Options<span class="plusminus">+</span></div>
          <div class="accordion_body">
            <div class="form1">
              <div class="form-group">
                <label>Gift Wrap? </label>
                <div class="radio">
                  <label><input type="radio" name="optradio" checked>No</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Yes</label>
                </div>
              </div>
              <div class="btn-left">
                <button class="nextbutton" type="button">Next</button>
              </div>
            </div>
          </div>

          <div class="accordion_head" name='pay'>Payment<span class="plusminus">+</span></div>
          <div class="accordion_body" id="checkout2">
            <div class="form1">
              <div class="form-group">
                <label for="usraddress">Choose one credit card:</label>
                <select class="form-control" id="usrpayment">
                  <option value="*">Enter a new card:</option>
                  <?php
                  $addreses = getUserPayment();
                  $array = json_decode($addreses);
                  if(is_array($array)){
                    foreach($array as $key){
                      $cardId = $key->paymentId;
                      $s = 'name : '.$key ->nameOnCard;
                      $s = $s.'.card : '.$key->cardType;
                      $ccnumber= $key->creditCardNumber;
                      $ccnumber=  substr($ccnumber, -4);
                      $s = $s.'. last 4 digits '.$ccnumber;
                      echo "<option value='$cardId'>$s</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="usr">Select a Card:</label>
                <select class="form-control" id="card">
                  <label>Name on Card:</label>
                  <option value=" ">Select</option>
                  <option value="amex">American Express</option>
                  <option value="visa">Visa</option>
                  <option value="mastercard">Mastercard</option>
                  <option value="discover">Discover</option>
                </select>
                <div class="error" id="carderror"></div>
              </div>
              <div class="form-group">
                <label>Name on Card:</label>
                <input type="text" class="form-control" id="nam"/>
                <div class="error" id="namerror"></div>
              </div>
              <div class="form-group">
                <label for="num">Credit/Debit Card Number:</label>
                <input type="number" class="form-control" id="cardno"/>
                <div class="error" id="numerror"></div>
              </div>
              <!-- <div class="card"> -->
              <div class="form-group">
                <label>CVV:</label>
                <input type="number" class="form-control" id="cvv"/>
                <div class="error" id="cvverror"></div>
              </div>
              <div class="form-group">
                <label>Valid Thru (MM/YYYY):</label>
                <input type="month" class="form-control" id='validdate'/>
              </div>
              <!-- </div> -->
              <div class="pay">
                <p>Accepted Cards:</p>
                <img src="/lesuirely/images/card.png" alt="Accepted Cards">
              </div>
              <!-- <div class="form-group">
              <label for="num">Enter PROMO Code for additional discounts (if any):</label>
              <input type="number" class="form-control" id="num"/>
            </div> -->
            <div class="btn-left">
              <button class="nextbutton" type="button">Next</button>
            </div>
          </div>
        </div>

        <div class="accordion_head">Place Order<span class="plusminus">+</span></div>
        <div class="accordion_body">
          <div class ="form1">
            <p>This will display all the details entered by user for verification and finally place an order</p>
            <div class="btn-left">
              <button class="cbtn" type="button" id="order">Place Order</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </fieldset>
</div>

<!--CART-->
<div class="box" id="cartbox">
  <fieldset>
    <legend>Cart</legend>
    <?php
    $data= getPurchasedItem();
    ?>
    <table class="table table-striped">
      <tr>
        <th class="col-md-1">Type</th>
        <th class="col-md-1">Product</th>
        <th class="col-md-3 center">Name</th>
        <th class="col-md-2 center">Price</th>
        <th class="col-md-3 center">Unit Qty</th>
        <th class="col-md-2">Total Price</th>
      </tr>
      <?php
      if(is_array($data)){
        $totalprice=0;
        foreach($data as $key){
          $price=$key->uprice;
          $qty=$key->quantity;
          $price=str_replace('$','', $price);
          $tprice = (float)$price * (int)$qty;
          $totalprice+=$tprice;
          ?>
          <tr>
            <td name="ptype"><?=$key->ptype ?></td>
            <td name="ctype"><?=$key->ctype?></td>
            <td name="title" id='purchasetitle' class='center'><p><?=$key->title?></p><img src=<?=$key->img?> width=100 height=150></td>
            <td name="price" class ="center"><?=$key->uprice?></td>
            <td name="qty" id="purchaseqty" class="center"><div class="cartqty">
              <p>  <?php
              echo '<span>'.$qty.'</span>';
              if ($key->ptype=='Rent') {
                echo ' weeks';
              }else{
                echo ' items';
              }
              ?></p>
              <?php
              if($qty==0){
                echo '<button class="btn btn-default chqty disabled">-</button>';
              }else{
                echo '<button class="btn btn-default chqty">-</button>';
              }
              ?>
              <button class="btn btn-default chqty">+</button>

            </div>
            <div id="deletion"><span class="itemid" hidden><?=$key->id?></span><button class="btn btn-danger">delete</button>
            </div></td>
            <td name="tprice">$ <?=$tprice?></td>
          </tr>
          <?php
        }
        ?>
        <tr>
          <td colspan="100%" id="catli"><h4>Total:&nbsp&nbsp&nbsp$ <?=$totalprice?></h4></td>
        </tr>
        <?php
      }
      ?>
    </table>

  </fieldset>
</div>
</body>
</html>
