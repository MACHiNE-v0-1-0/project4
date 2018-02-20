console.log('cart check-out');
$('#cart-check-out-modal').ready(function(){
	var btnCheckOut = $('.cart-check-out button');

// click btn check out
	btnCheckOut.click(function(){
		$.ajax({
			url: DOMAIN +"LoadHtml/loadCartCheckOut", 
			dataType:'html',
			async: true,
			error:function(err, status){
				console.log(status);
			},
			success:function(res){
				if($('#cart-check-out-modal').length === 0){
					$('body').prepend(res);
				} else {
					$('#cart-check-out-modal').slideDown('fast');
				}
				
				

				
			} // end success
		}); // end ajax
	});



			

	
});