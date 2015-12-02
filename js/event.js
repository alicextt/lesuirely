//<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
function getDate(){
  var x = document.lastModified;
  document.getElementById("lastModified").innerHTML = x;
}


function editInfoClick(){
  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var usr = $("#usr").val();
  var email = $("#email").val();
  var pwd = $("#pwd").val();
  var cpwd = $("#cpwd").val();
  var phone = $("#phone").val();
  var address1 = $("#address1").val();
  var address2 = $("#address2").val();
  var city = $("#city").val();
  var state = $("#state").val();
  var country = $("#country").val();
  var zip = $("#zip").val();

  var count = 0;

  if(fname == ''){
    $("#fnameError").text("* Empty first name!");
  }
  else{
    count++;
  }

  if(lname == ''){
    $("#lnameerror").text("* Empty last name");
  }
  else{
    count++;
  }

  if(usr == ''){
    $("#usrerror").text("* Empty user name");
  }
  else{
    count++;
  }

  if(email == ''){
    $("#mailerror").text("* Empty email address")
  }
  else{
    count++;
  }

  if(pwd == ''){
    $("#pwderror").text("* Empty password");
  }
  else{
    count++;
  }

  if(cpwd == ''){
    $("#cpwderror").text("* Confirm your password");
  }
  else{
    count++;
  }

  if(phone = ''){
    $("#phoneerror").text("* Enter phone number");
  }
  else{
    count++;
  }

  if(address1 == '' ){
    $("#adderror1").text("* Empty address1");
  }
  else{
    count++;
  }

  if(city == ''){
    $("#cityerror").text("* Empty city name");
  }
  else{
    count++;
  }

  if(state == ''){
    $("#stateerror").text("* Empty state");
  }
  else{
    count++;
  }

  if(country == ''){
    $("#countryerror").text("* Empty country");
  }
  else{
    count++;
  }

  if(zip == ''){
    $("#ziperror").text("* Empty zip code");
  }
  else{
    count++;
  }

  if(count == 12){
    if(pwd === cpwd){

      $.post("/lesuirely/php_func/info.php", {
        firstname: fname,
        lastname: lname,
        username: usr,
        emailaddress: email,
        password: pwd,
        phonenumber: phone,
        addressfirst: address1,
        addresssecond: address2,
        city1: city,
        state1: state,
        country1: country,
        zipcode: zip
      }, function(data) {
        if (data == 'Success') {
          $("form")[0].reset();
          //alert("yes");

          // this will jump to the index html
          //window.location.replace("/lesuirely/php_pages/userInfo.php");
        }
        //alert(data);
      });
    }
    else{
      $("#passerror").text("passwords do not match");
    }
  };
}


$(window).load(function(){
  window.resizeTo(1245, 800);

  //*******************Checkout**********************************************************************************************//

  //******************************Luhncheck for Credit card validation*****************************************************//
  //***********************************************************************************************************************//
  var luhnChk = (function (arr) {
    return function (value) {
      var len = value.length,bit = 1,sum = 0;
      while(len--){
        sum += !(bit ^= 1) ? parseInt(value[len], 10) : arr[value[len]];
      }
      return sum % 10 === 0 && sum > 0;};
    }([0, 2, 4, 6, 8, 1, 3, 5, 7, 9]));
    //************************************************************************************************************************//
    function cardnumber(inputtxt)
    {
      var amex = /^(?:3[47][0-9]{13})$/;
      var visa = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
      var mastercard = /^(?:5[1-5][0-9]{14})$/;
      var discover = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
      var val = document.getElementById("card");
      //var num =
      var carderror;
      var cardno;
      //alert(inputtxt.value);

      if(val.value ==" "){
        document.getElementById("carderror").innerHTML='<p>'+"Please select a Card"+'</p>';
        return false;
      }
      else if(val.value =="amex"){
        cardno = amex;
        //alert("amex");
      }
      else if(val.value =="visa"){
        cardno = visa;
        //alert("visa");
      }
      else if(val.value =="mastercard"){
        cardno = mastercard;
        //alert("mastercard");
      }
      else if(val.value =="discover"){
        cardno = discover;
        //alert("discover");
      }
      document.getElementById("carderror").innerHTML='';

      //alert(inputtxt.value);
      if(inputtxt.value.match(cardno))
      {
        // alert("pass");
      //inputtxt = inputtxt.toString();
      if(luhnChk(inputtxt.value)){
        //alert("valid");
        return true;
      }
      else{
        alert("Invalid Card Number");
        return false;
      }
    }
    else
    {
      alert("Not a valid credit card number!");
      return false;
    }
  }

  function validatePay(){
    //--------CREDIT CARD---------------------//
    //var cvv = $("#cvv").val();
    var cvv = document.getElementById("cvv").value;
    var cardno = document.getElementById("cardno");
    //alert(cardno.value);
    var nam = document.getElementById("nam").value;
    //alert(nam.value);
    var number=0;
    if(!nam.match(/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/)){
      document.getElementById("namerror").innerHTML= '<p>'+"Please enter the Card Holder's Name"+'</p>';
    }else{
      document.getElementById("namerror").innerHTML='';
      number+=1;
    }

    if(cardno.value ===''){
      document.getElementById("numerror").innerHTML= '<p>'+"Please enter a Card Number"+'</p>';
    }else{
      document.getElementById("numerror").innerHTML='';
      number+=1;
    }

    if(cardnumber(cardno)){
      number+=1;
    }

    var val = document.getElementById("card");
    //alert(cvv);
    //alert(val.value);
    cvv = cvv.toString();
    if (val.value == "amex" && cvv.length === 4){
      // alert("valid 4-digit cvv");
      document.getElementById("cvverror").innerHTML='';
      number+=1;
    }
    else if (val.value != " " && cvv.length === 3){
      // alert("valid 3-digit cvv");
      document.getElementById("cvverror").innerHTML='';
      number+=1;
    }
    else if (!cvv){
      document.getElementById("cvverror").innerHTML= '<p>'+"Please enter a CVV"+'</p>';
    }
    return number==4;
  }
  //************************************************************************************************************************//

  $("#order").click(function(){
    if(! validateAddress()){
      $(".accordion_head[name='shipping']").trigger('click');
      return;
    }
    var shipid=$('#usraddress').val();
    if(! validatePay()){
      $(".accordion_head[name='pay']").trigger('click');
      return;
    }
    var payid=$('#usrpayment').val();
    var delievery = $('input:radio[name=option]:checked').next().text();
    $.post('../php_func/placeorder.php',{
      ship:shipid,
      card:payid,
      delievery: delievery
    }, function(data){
      if(data=='success'){
        alert('Your order have been placed!');
        window.location.href='/lesuirely/php_pages/order.php';
      }else{
        console.log(data);
      }
    });
  });

  $(".nextbutton").click(function(){
    var x=$(this).parent().parent().parent();
    if(x.attr('id')=='checkout1'){
      if(!validateAddress()){
        return;
        }
      }else if(x.attr('id')=='checkout2'){
        if(!validatePay()){
          return;
        }
      }
    x.next(".accordion_head").trigger('click');
  });

  //************************************End of Checkout************************************************//
  //**************** used in /lesuirely/html/signUp.html . the register button clicked will first do validation and then will do an ajax call to /lesuirely/php_func/register.php and save data into DB.
  $("#register").click(function(){
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var name=$("#usr").val();
    var email = $("#email").val();
    var password = $("#pwd").val();
    var cpassword = $("#cpwd").val();
    var count=0;
    if(fname == ''){
      $("#fnameError").text('* Empty first name!');
    }
    else if (fname.match("/^[a-zA-Z ]*$/")) {
      $("#fnameError").text('* Only letters and whitespace allowed!');
    }
    else{
      $("#fnameError").text('');
      count++;
      //console.log(fname);
    }

    if(lname == ''){
      $("#lnameError").text('* Empty last name!');
    }
    else if (lname.match("/^[a-zA-Z ]*$/")) {
      $("#lnameError").text('* Only letters and whitespace allowed!');
    }
    else{
      $("#lnameError").text('');
      count++;
      //console.log(lname);
    }

    if(name == ''){
      $("#usrerror").text('* Empty user name !');
    }else if(!name.match(/^\w+$/)){
      $("#usrerror").text('* User name have to be either number or letters !');
      $("$usr").val(name);
    }else{
      $("#usrerror").text('');
      count++;
    }

    if(email == ''){
      $("#mailerror").text('* Empty email address !');
    }else if(!email.match(/^([\w-\.]+@[\w-]+\.[\w-]{2,4})?$/)){
      $("#mailerror").text('* Invalid email address!');
    }else{
      $("#mailerror").text('');
      count++;
    }

    if(password == ''){
      $("#pwderror").text('* Empty password !');
    }else if(!password.match(/^([a-zA-Z0-9!@.\-_]){6,}$/)){
      $("#pwderror").text('* Invalid password a-zA-Z0-9!@-. allowed at least length 6!');
    }else{
      $("#pwderror").text('');
      count++;
    }

    if(cpassword!=password){
      $("#cpwderror").text('* Password not same. Try again!');
    }else{
      $("#cpwderror").text('');
      count++;
    }
    if(count==6)
    {
      $.post("/lesuirely/php_func/register.php", {
        fname1:fname,
        lname1:lname,
        name1: name,
        email1: email,
        password1: password
      }, function(data) {
        if (data == 'Success') {
          // this will jump to the index html

          window.location.replace("/lesuirely/php_pages/index.php");
          console.log('insert user'+name+" successfully");
          window.location.replace("/lesuirely/html/login.html");
        }
        else if(data=='User name taken'){
          $("#usrerror").text('* This user name has already been take !');
        }else{
          alert('An sql error has occured');
        }
      });
    }
  });
});

$(document).ready(function(){
  // sign up passoorc check function
  $(":password").hover(function(){
    $(":password").attr('type','text');
  },function(){
    $("#pwd").attr('type','password');
    $("#cpwd").attr('type','password');
  }
);

//********************** button in /lesuirely/html/login.html. call to /lesuirely/php_func/login.php to validate data.
// login and check if user name && password are correct
$("#login").click(function(){
  $("#usrerror").text('');
  $("#pwderror").text('');
  var name1=$("#usrname").val();
  var pwd1=$("#pwd").val();
  $.post("/lesuirely/php_func/login.php", {
    name:name1,
    pwd:pwd1
  }, function(data){
    if (data == 'Success') {
      $("form")[0].reset();
      // this will jump to the index html
      window.location.replace("/lesuirely/php_pages/index.php");
    }
    // alert(data);
    else if (data =='User name incorrect!') {
      $("#usrerror").text('User name incorrect!');
    }else{
      $("#pwderror").text('Password incorrect!');
    }
  });
});
});

$(document).ready(function () { //toggle the component with class accordion_body
  $(".accordion_head").click(function () {
    if ($('.accordion_body').is(':visible')) {
      $(".accordion_body").slideUp(300); $(".plusminus").text('+');
    }
    if ($(this).next(".accordion_body").is(':visible')) {
      $(this).next(".accordion_body").slideUp(300);
      $(this).children(".plusminus").text('+'); }
      else {
        $(this).next(".accordion_body").slideDown(300);
        $(this).children(".plusminus").text('-'); }
      });
    });



    $(document).ready(function () { //toggle the component with class inner_accordion_body
       $(".inner_accordion_head").click(function () {
        if ($('.inner_accordion_body').is(':visible')) {
          $(".inner_accordion_body").slideUp(300); $(".plusminus1").text('+');
        }
        if ($(this).next(".inner_accordion_body").is(':visible')) {
          $(this).next(".inner_accordion_body").slideUp(300);
          $(this).children(".plusminus1").text('+'); }
        else {
            $(this).next(".inner_accordion_body").slideDown(300);
            $(this).children(".plusminus1").text('-'); }
        });
    });



function validateAddress(){
  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var usr = $("#usr").val();
  var email = $("#email").val();
  var pwd = $("#pwd").val();
  var cpwd = $("#cpwd").val();
  var address1 = $("#address1").val();
  var address2 = $("#address2").val();
  var city = $("#city").val();
  var state = $("#state").val();
  var country = $("#country").val();
  var zip = $("#zip").val();
  var phone = $("#phone").val();

  var name_regex= /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
  var address_regex = /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/;
  var count = 0;
  if(!fname.match(name_regex) || fname.length == 0){
    document.getElementById("fnerror").innerHTML = '<p>'+"Please enter the first name"+'</p>';
    $("#fnerror").focus();
  }
  else{
    document.getElementById("fnerror").innerHTML ='';
    count++;
  }
  if(!lname.match(name_regex) || lname.length == 0){
    document.getElementById("lnerror").innerHTML= '<p>'+"Please enter the last name"+'</p>';
  }
  else{
    document.getElementById("lnerror").innerHTML ='';
    count++;
  }
  if(!address1.match(address_regex) || address1.length == 0){
      document.getElementById("adderror").innerHTML= '<p>'+"Please enter the address first line"+'</p>';
  }
  else{
    document.getElementById("adderror").innerHTML ='';
    count++;
  }
  if(!city.match(name_regex) || city.length == 0){
    document.getElementById("cityerror").innerHTML= '<p>'+"Please enter the city"+'</p>';
  }
  else{
    document.getElementById("cityerror").innerHTML ='';
    count++;
  }
  if(state == " "){
    document.getElementById("staterror").innerHTML='<p>'+"Please select the state"+'</p>';
  }
  else{
    document.getElementById("staterror").innerHTML ='';
    count++;
  }
  if(!country.match(name_regex) || country.length == 0){
    document.getElementById("countryerror").innerHTML='<p>'+"Please enter the country"+'</p>';
  }
  else{
    document.getElementById("countryerror").innerHTML ='';
    count++;
  }
  if(zip == '' || !$.isNumeric(zip)){
    document.getElementById("ziperror").innerHTML= '<p>'+"Please enter a valid zip code"+'</p>';
  }
  else{
    document.getElementById("ziperror").innerHTML ='';
    count++;
  }
  if(phone == '' || !$.isNumeric(zip)){
    document.getElementById("phonerror").innerHTML= '<p>'+"Please enter a valid phone number"+'</p>';
  }
  else{
    document.getElementById("phonerror").innerHTML ='';
    count++;
  }
  return count==8;
}
  // **************** slider related function in /lesuirely/php_pages/index.php
        //Silder
        var ul;
        var li_items;
        var imageNumber;
        var imageWidth;
        var prev, next;
        var currentPostion = 0;
        var currentImage = 0;


        function init(){
          ul = document.getElementById('image_slider');
          if(!ul)
          return;
          li_items = ul.children;
          imageNumber = li_items.length;
          imageWidth = li_items[0].children[0].children[0].clientWidth;
          ul.style.width = parseInt(imageWidth * imageNumber) + 'px';
          prev = document.getElementById("prev");
          next = document.getElementById("next");
          setInterval(onClickNext, 8000);
          prev.onclick = function(){ onClickPrev();};
          next.onclick = function(){ onClickNext();};
        }

        function animate(opts){
          var start = new Date;
          var id = setInterval(function(){
            var timePassed = new Date - start;
            var progress = timePassed / opts.duration;
            if (progress > 1){
              progress = 1;
            }
            var delta = opts.delta(progress);
            opts.step(delta);
            if (progress == 1){
              clearInterval(id);
              opts.callback();
            }
          }, opts.delay || 17);
          //return id;
        }

        function slideTo(imageToGo){
          var direction;
          var numOfImageToGo = Math.abs(imageToGo - currentImage);

          direction = currentImage > imageToGo ? 1 : -1;
          currentPostion = -1 * currentImage * imageWidth;
          var opts = {
            duration:1000,
            delta:function(p){return p;},
            step:function(delta){
              ul.style.left = parseInt(currentPostion + direction * delta * imageWidth * numOfImageToGo) + 'px';
            },
            callback:function(){currentImage = imageToGo;}
          };
          animate(opts);
        }

        function onClickPrev(){
          if (currentImage == 0){
            slideTo(imageNumber - 1);
          }
          else{
            slideTo(currentImage - 1);
          }
        }

        function onClickNext(){
          if (currentImage == imageNumber - 1){
            slideTo(0);
          }
          else{
            slideTo(currentImage + 1);
          }
        }

        window.onload = init;
