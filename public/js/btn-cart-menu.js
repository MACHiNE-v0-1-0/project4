$('document').ready(function(){
	var cart = $("#cart");
	cart.hover(function(){
		var cartMenu =$('#cart-menu');
		cartMenu.fadeIn('fast');
		cart.mouseleave(function(){
			cartMenu.fadeOut('slow');
		});
	});
});