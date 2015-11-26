//<!-- ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-->
function getDate(){
  var x = document.lastModified;
  document.getElementById("lastModified").innerHTML = x;
}

$(window).load(function(){
  window.resizeTo(1245, 800);

//**************** used in signUp.html . the register button clicked will first do validation and then will do an ajax call to register.php and save data into DB.
$("#register").click(function(){
  var name=$("#usr").val();
  var email = $("#email").val();
  var password = $("#pwd").val();
  var cpassword = $("#cpwd").val();
  var count=0;
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
  if(count==4)
  {
    $.post("register.php", {
      name1: name,
      email1: email,
      password1: password
    }, function(data) {
      if (data == 'Success') {
        $("form")[0].reset();
        // this will jump to the index html
        window.location.replace("login.html");
      }
      // alert(data);
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
