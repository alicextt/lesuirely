// ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************


$(document).ready(function(){

  $('.btn.btn-info').click(function(){
    var tr=$(this).parent().parent();
    var ptype = tr.find("[name='type']").text();
    var quantity=tr.find('select option:selected').val();
    var img=$(".left img").attr('src');
    $.post('addcart.php',{
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
      $.post("updateCart.php", {
        title: x,
        qty:t+1,
      }, function(data){
        console.log("update cart successfully");
      });
    }else if(t>0){
      $.post("updateCart.php", {
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
    $.post("updateCart.php", {
      category: ctype,
      id:id,
    }, function(data){
      console.log("delete item from cart successfully");
    });
    window.location.reload();
  });

  $('.totalpriceperpo').each(function(){
    var total=$(this);
    var t=0;
    total.parent().parent().parent().parent().find(".itemprice").each(function(){
      var s=$(this).text();
      t+= parseFloat(s);
    });
    total.text('$ '+t);
  });


  $('#buyagain .btn.btn-danger').click(function(){
    var x=$(this);
    $.post('addcart.php',{
      id: x.parent().find('#itemid').text(),
      ptype: x.parent().parent().parent().find('[name="ptype"]').text(),
      ctype: x.parent().parent().parent().find('[name="ctype"]').text(),
      uprice: x.parent().parent().parent().find('.itemprice').text(),
      quantity: 1,
      title: x.parent().parent().parent().find('a').text(),
      img: x.parent().parent().parent().find('img').attr('src'),
    }, function(data){
      window.location.href='checkout.php';
    });
  });



  $('#buyagain .btn.btn-danger').click(function(){
    var x=$(this);
    $.post('addcart.php',{
      id: x.parent().find('#itemid').text(),
      ptype: x.parent().parent().parent().find('[name="ptype"]').text(),
      ctype: x.parent().parent().parent().find('[name="ctype"]').text(),
      uprice: x.parent().parent().parent().find('.itemprice').text(),
      quantity: 1,
      title: x.parent().parent().parent().find('a').text(),
      img: x.parent().parent().parent().find('img').attr('src'),
    }, function(data){
      window.location.href='checkout.php';
    });
  });

});
