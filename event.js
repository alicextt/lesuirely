function getDate(){
  var x = new Date(document.lastModified);
  document.getElementById("lastModified").innerHTML = x;
}

function changeImage(){
  var button = document.getElementById("id");
  document.getElementById("imageChange").src = "img2.jpg";
}

function signin(){
  var text = document.getElementById("sign");
  if(text.innerHTML == "Sign In"){
    text.innerHTML = "Sign Up";
  }
  else if(text.innerHTML == "Sign Up"){
    text.innerHTML = "Sign In";
  }
}

$(window).load(function(){
  window.resizeTo(1245, 800);
});

$(document).ready(function(){
  $(":password").hover(function(){
    $(":password").attr('type','text');
  },function(){
    $("#pwd").attr('type','password');
    $("#cpwd").attr('type','password');
  }
);

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
        window.location.replace("index.html");
      }
      alert(data);
    });
  }
});
});

<<<<<<< HEAD
$(document).ready(function($) {
    $('#accordion').find('.accordion-toggle').click(function(){

      //Expand or collapse this panel
      $(this).next().slideToggle('fast');

      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });
  });

$(document).ready(function($) {
    $('#accordion').find('.inner-accordion-toggle').click(function(){

      //Expand or collapse this panel
      $(this).next().slideToggle('fast');

      //Hide the other panels
      $(".inner-accordion-content").not($(this).next()).slideUp('fast');

    });
  });
=======

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
  imageWidth = li_items[0].children[0].clientWidth;
  ul.style.width = parseInt(imageWidth * imageNumber) + 'px';
  prev = document.getElementById("prev");
  next = document.getElementById("next");
  setInterval(onClickNext, 5000);
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
>>>>>>> 550f54c2b7efa9b6e3a023ade288daf8f8c9cb86
