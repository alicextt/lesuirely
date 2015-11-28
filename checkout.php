<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
<?php
session_start();
ini_set('display_errors', 'On');
include("func.php");
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

  <script src = "event.js" type = "text/javascript"></script>
  <script src = "item.js" type = "text/javascript"></script>

  <link href="styles.css" rel="stylesheet">
</head>
<body class = "checkout">
  <!-- header-->
  <noscript> Browser does not support JAVASCRIPT</noscript>
  <header class="checkout">
    <a href="index.php" ><img src = "logo.png" alt="logo" height="150" width="150"></a>
    </header>
    <div class="box">
      <fieldset>
      <legend>Checkout</legend>
      <div class="accordion_container">

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
                  </form>
                </div>
            </li>
          </ul>
        </div>
      </div>

        <div class="accordion_head">Shipping<span class="plusminus">+</span></div>
        <div class="accordion_body">
          <div class="form1">
          <form accept-charset="UTF-8" action="#" method="post">
          <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname"/><div class="error" id="nerror"></div>
          </div>
          <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname"/><div class="error" id="nerror"></div>
          </div>
          <div class="form-group">
            <label>Company:</label>
            <input type="text" class="form-control"/>
          </div>
          <div class="form-group">
            <label for="address">Address Line 1:</label>
            <input type="text" class="form-control" id="address"/><div class="error" id="adderror"></div>
          </div>
          <div class="form-group">
            <label for="address">Address Line 2:</label>
            <input type="text" class="form-control" id="address"/><div class="error" id="adderror"></div>
          </div>
          <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city"/><div class="error" id="nerror"></div>
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
          </div>
          <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country"/><div class="error" id="nerror"></div>
          </div>
          <div class="form-group">
            <label for="num">Zip Code:</label>
            <input type="number" class="form-control" id="num"/><div class="error" id="numerror"></div>
          </div>
          <div class="form-group">
            <label for="num">Phone:</label>
            <input type="number" class="form-control" id="num"/><div class="error" id="numerror"></div>
          </div>

           <div class="form-group">
            <label>Delivery: </label>
          <div class="radio">
                  <label><input type="radio" name="optradio1" checked>7-9 business days (Free Shipping on Orders over $35.00)</label>
          </div>
          <div class="radio">
                  <label><input type="radio" name="optradio1">3-5 business days - $7.00</label>
          </div>
          <div class="radio">
              <label><input type="radio" name="optradio1">2 business days - $17.00</label>
          </div>
          <div class="radio">
                <label><input type="radio" name="optradio1">1 business day - $22.00</label>
          </div>
          <div class="radio">
              <label><input type="radio" name="optradio">2 business days - $17.00</label>
          </div>
          <div class="radio">
                <label><input type="radio" name="optradio">1 business day - $22.00</label>
          </div>
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
          </div>
        </div>

        <div class="accordion_head">Payment<span class="plusminus">+</span></div>
        <div class="accordion_body">
        <div class="form1">
          <div class="form-group">
            <label>Name on Card:</label>
            <input type="text" class="form-control"/>
          </div>
          <div class="form-group">
            <label for="num">Credit/Debit Card Number:</label>
            <input type="number" class="form-control" id="num"/>
          </div>
          <div class="card">
          <div class="form-group">
            <label>CVV:</label>
            <input type="text" class="form-control"/>
          </div>
          <div class="form-group">
            <label>Valid Thru (MM/YYYY):</label>
            <input type="text" class="form-control"/>
          </div>
        </div>
         <div class="pay">
          <p>Accepted Cards:</p>
          <img src="card.png" alt="Accepted Cards">
          </div>
          <!-- <div class="form-group">
            <label for="num">Enter PROMO Code for additional discounts (if any):</label>
            <input type="number" class="form-control" id="num"/>
          </div> -->
          </div>
        </div>

        <div class="accordion_head">Place Order<span class="plusminus">+</span></div>
        <div class="accordion_body">
          <div class ="form1">
        <p>This will display all the details entered by user for verification and finally place an order</p>
        <div class="btn-left">
                    <button class="cbtn" type="button" value="submit">Place Order</button>
        </div>
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
          <th class="col-md-1 center">Price</th>
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
          <td name="price"><?=$key->uprice?></td>
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
