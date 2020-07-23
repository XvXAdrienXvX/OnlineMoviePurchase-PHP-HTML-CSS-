
$(document).ready(function() {
    $.ajax({
   url:"FetchCart.php",
   method:"POST",
   dataType:"json",
   success:function(data)
   {
    $('#cart_details').html(data.cart_details);
    $('.total_price').text(data.total_price);
    $('.badge').text(data.total_item);
       $('#total').text("Rs "+data.total_price);
   }
  });
   
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
             $item2=document.getElementById
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
  
    $('#activate-step-2').on('click', function(e) {
        if($('#Address').val()==""){
             $('#errorAdd').show("fast");
            $('#errorAdd').text('address required');
        }
        else{
            $('#errorAdd').hide("fast");
        }
        if($('#Zip').val()==""){
            $('#errorZip').show("fast")
           $('#errorZip').text('Zip Code required');
        }
        else{
             $('#errorZip').hide("fast");
        }
        if($('#City').val()==""){
            
          $('#errorCity').show("fast")
          $('#errorCity').text('Name of City required');
        }
        else{
             $('#errorCity').hide("fast");
        }
        if($('#Address').val()!=""&&$('#Zip').val()!=""&&$('#City').val()!=""){
             $('#errorAdd').hide("fast");
             $('#errorZip').hide("fast");
             $('#errorCity').hide("fast");
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
           $('ul.setup-panel li a[href="#step-2"]').trigger('click');
           $(this).remove();
             var action="next1";
            $.ajax({
                url:"chkout.php",
                method:"POST",
                data:{address:$('#Address').val(), zip:$('#Zip').val(), city:$('#City').val(),action:action},
                success:function(data)
                {
                 
                 alert("validated");
                }
           });
        }
        
    })    
    $('#activate-step-3').on('click', function(e) {
       
         if($('#cname').val()==""){
             $('#errorCName').show("fast");
            $('#errorCName').text('card name required');
        }
        else{
            $('#errorCName').hide("fast");
        }
        if($('#cno').val()==""){
            $('#errorCNO').show("fast")
           $('#errorCNO').text('card number required');
        }
        else{
             $('#errorCNO').hide("fast");
        }
        if($('#cvc').val()==""){
            
          $('#errorCVC').show("fast")
          $('#errorCVC').text('CVC required');
        }
        else{
             $('#errorCVC').hide("fast");
        }
        if($('#exp').val()==""){
            
          $('#errorEXP').show("fast")
          $('#errorEXP').text('Expiration date required');
        }
        else{
             $('#errorEXP').hide("fast");
        }
        if($('#cname').val()!=""&&$('#cno').val()!=""&&$('#cvc').val()!=""&&$('#exp').val()!=""){
             $('#errorCName').hide("fast");
             $('#errorCNO').hide("fast");
             $('#errorCVC').hide("fast");
            $('#errorEXP').hide("fast");
             $('ul.setup-panel li:eq(2)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            $(this).remove();
            var action="next2";
             $.ajax({
                url:"chkout.php",
                method:"POST",
                data:{cname:$('#cname').val(), cno:$('#cno').val(), cvc:$('#cvc').val(), exp:$('#exp').val(),action:action},
                success:function(data)
                {
                 
                 alert("validated");
                }
           });
        }
    }) 
    
    
$(document).on('click', '#Pay', function(){
  var action = 'empty';
  $.ajax({
   url:"AddToCart.php",
   method:"POST",
   data:{action:action},
   success:function()
   {
    load_cart_data();
    alert("payment successful");
   }
  });
 });
    
   
});    