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

      $.post("info.php", {
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
          //window.location.replace("userInfo.php");
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
$("#checkout").click(function(){
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

  // var fnerror = "";
  // var lnerror = "";
  // var adderror = "";
  // var cityerror = "";
  // var staterror = "";
  // var phonerror = "";
  var count = 0;

  if(fname == /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/){
    document.getElementById("fnerror").innerHTML = '<p>'+"Please enter the first name"+'</p>';
    alert("Please enter the first name");
  }
  else{
    count++;
  }
  if(lname == /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/){
    document.getElementById("lnerror").innerHTML= '<p>'+"Please enter the last name"+'</p>';
  }
  else{
    count++;
  }
  if(address1 == /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/ ){
    document.getElementById("adderror").innerHTML= '<p>'+"Please enter the address first line"+'</p>';
  }
  else{
    count++;
  }
  if(city == /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/){
    document.getElementById("cityerror").innerHTML= '<p>'+"Please enter the city"+'</p>';
  }
  else{
    count++;
  }
  if(state == ""){
    document.getElementById("staterror").innerHTML='<p>'+"Please select the state"+'</p>';
  }
  else{
    count++;
  }
  if(country == /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/){
    document.getElementById("countryerror").innerHTML='<p>'+"Please enter the country"+'</p>';
  }
  else{
    count++;
  }
  if(zip == '' || !IsNumeric(zip)){
    document.getElementById("ziperror").innerHTML= '<p>'+"Please enter a valid zip code"+'</p>';
  }
  else{
    count++;
  }
  if(phone == '' || !IsNumeric(zip)){
    document.getElementById("phonerror").innerHTML= '<p>'+"Please enter a valid phone number"+'</p>';
  }
  else{
    count++;
  }

  // if(count == 8){
  //   if(pwd === cpwd){
  //     //alert("yes");
  //     $.post("info.php", {
  //       fname1: fname,
  //       lname1: lname,
  //       name1: name,
  //       email1: email,
  //       password1: password
  //     }, function(data) {
  //       if (data == 'Success') {
  //         $("form")[0].reset();
  //         // this will jump to the index html
  //         window.location.replace("login.html");
  //       }
  //       // alert(data);
  //     });
  //   }
  //   else{
  //     errorText = "Passwords do not match";
  //   }
  // }

});

//************************************End of Checkout************************************************//
//**************** used in signUp.html . the register button clicked will first do validation and then will do an ajax call to register.php and save data into DB.
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
    $.post("register.php", {
      fname1:fname,
      lname1:lname,
      name1: name,
      email1: email,
      password1: password
    }, function(data) {
      if (data == 'Success') {
        // this will jump to the index html

        window.location.replace("index.php");
        console.log('insert user'+name+" successfully");
        window.location.replace("login.html");
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

//********************** button in login.html. call to login.php to validate data.
// login and check if user name && password are correct
$("#login").click(function(){
  $("#usrerror").text('');
  $("#pwderror").text('');
  var name1=$("#usrname").val();
  var pwd1=$("#pwd").val();
  $.post("login.php", {
    name:name1,
    pwd:pwd1
  }, function(data){
    if (data == 'Success') {
      $("form")[0].reset();
      // this will jump to the index html
      window.location.replace("index.php");
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


    // **************** slider related function in index.php
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

        $(document).ready(function($) {
          $('#accordion').find('.accordion-toggle').click(function(){

            //Expand or collapse this panel
            $(this).next().slideToggle('400');

            //Hide the other panels
            $(".accordion-content").not($(this).next()).slideUp('400');


          });
        });

        $(document).ready(function($) {
          $('#accordion').find('.inner-accordion-toggle').click(function(){

            //Expand or collapse this panel
            $(this).next().slideToggle('400');

            //Hide the other panels
            $(".inner-accordion-content").not($(this).next()).slideUp('400');

          });
        });

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
