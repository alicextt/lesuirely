// ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************


$(document).ready(function(){

  $('.btn.btn-info').click(function(){
    var tr=$(this).parent().parent();
    var ptype = tr.find("[name='type']").text();
    var quantity=tr.find('select option:selected').val();
    var img=$(".left img").attr('src');
    var id=$('#itemid').text();
    $.post('../php_func/addcart.php',{
      id:$('#itemid').text(),
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
    var qty=$(this).parent().find('span');
    var t=parseInt(qty.text());
    var x= $(this).parent().parent().parent().find('[name="title"] p').text();
    if ($(this).text()=='+'){
      $(this).siblings().prop('disabled',false);
      $.post("../php_func/updateCart.php", {
        title: x,
        qty:t+1,
      }, function(data){
        console.log("update cart successfully");
      });
    }else if(t>0){
      $.post("../php_func/updateCart.php", {
        title: x,
        qty:t-1,
      }, function(data){
        console.log("update cart successfully");
      });
    }
    window.location.reload();
  });

  $('#deletion .btn.btn-danger').click(function(){
    var tr=$(this).parent().parent().parent();
    var id=tr.find('.itemid').text();
    var ctype=tr.find('[name="ctype"]').text().trim();
    $.post("../php_func/updateCart.php", {
      category: ctype,
      id:id,
    }, function(data){
      console.log("delete item from cart successfully");
    });
    window.location.reload();
  });

// ******************/lesuirely/php_pages/order.php
  $('.totalpriceperpo').each(function(){
    var total=$(this);
    var t=0;
    total.parent().parent().parent().parent().find(".itemprice").each(function(){
      var s=$(this).text();
      t+= parseFloat(s);
    });
    t=t.toFixed(2);
    total.text('$ '+t);
  });


  $('#buyagain .btn.btn-danger').click(function(){
    var x=$(this);
    var id = x.parent().find('.itemid').text();
    $.post('../php_func/addcart.php',{
      id: id,
      ptype: x.parent().parent().parent().find('[name="ptype"]').text(),
      ctype: x.parent().parent().parent().find('[name="ctype"]').text(),
      uprice: "$ "+x.parent().parent().parent().find('.itemprice').text(),
      quantity: 1,
      title: x.parent().parent().parent().find('a').text(),
      img: x.parent().parent().parent().find('img').attr('src'),
    }, function(data){
      window.location.href='checkout.php';
    });
  });

  // **************** checkout.php
  $('select[id="usraddress"]').on('change', function() {
    if(this.value!='*'){
      var data = {
        "address": this.value
      };
      $.ajax({
        method: "GET",
        url:'/lesuirely/php_func/userquery.php',
        data: data,
        dataType: "json",
        success: function(result){
          var names = result.person.split(' ');
          $("#fname").val(names[0]);
          $("#lname").val(names[1]);
          $("#address1").val(result.address1);
          $("#address2").val(result.address2);
          $("#city").val(result.city);
          $("#state").val(result.state);
          $("#country").val(result.country);
          $("#zip").val(result.zip);
          $("#phone").val(result.phone);
        }
      });
    }
  });

  $('select[id="usrpayment"]').on('change', function() {
    if(this.value!='*'){
      var data = {
        "card": this.value
      };
      $.ajax({
        method: "GET",
        url:'/lesuirely/php_func/userquery.php',
        data: data,
        dataType: "json",
        success: function(result){
          var card= result.cardType;
          $("#card").val(card.toLowerCase());
          $("#nam").val(result.nameOnCard);
          $("#cardno").val(result.creditCardNumber);
          var s =result.expiryDate.split('/');
          $("#validdate").val(s[1]+'-'+s[0]);
        }
      });
    }
  });

});
