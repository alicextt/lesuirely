// ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************
$(document).ready(function(){

  $('.btn.btn-info').click(function(){
    var tr=$(this).parent().parent();
    var ptype = tr.find("[name='type']").text();
    var quantity=tr.find('select option:selected').val();
    var img=$(".left img").attr('src');
    $.post('addcart.php',{
      ptype: ptype,
      ctype: $('title').text(),
      uprice: tr.find("[name='price']").text(),
      quantity: quantity,
      title: $('#title').text(),
      img: img,
    }, function(data){
      var q=quantity;
      if(ptype=='Rent'){
        q=1;
      }
       window.location.href=document.location+"&ad="+q;
    });
  });

  $('#continuesh').click(function(){
    window.location.href=$('title').text().replace(/ /g,'')+".php";
  });

  $('#detailcheckout').click(function(){
    window.location.href="checkout.php";
  });

  $('.btn.btn-default.chqty').click(function(){
    if ($(this).text()=='+'){
      var qty=$(this).parent().find('span');
      var t=parseInt(qty.text())+1;
      var x= $(this).parent().parent().parent().find('[name="title"] p').text();
      $.post("updateCart.php", {
        title: x,
        qty:t,
      }, function(data){
        console.log("update cart successfully");
      });
    }else{
      
    }
  });
});
