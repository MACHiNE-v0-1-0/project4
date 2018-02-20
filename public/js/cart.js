$('document').ready(function() {
	

	var btnQuantity = $('.cart-quantity-num input');

	var btnCartQuantityMore = $('.cart-quantity-more input');
	var btnCartQuantityLess = $('.cart-quantity-less input');
	var btnDel = $('.cart-del').find('.btn-cart-del');

/* btn minus quantity */
	btnCartQuantityLess.click(function(){
		var product = $(this).parent().parent().parent();
		
		var productID = product.find('.product-id').val();
		var fieldQuantity = product.find('.cart-quantity-num input');
		var numQuantity = product.find('.cart-quantity-num input').val();
		
		if(numQuantity <=  1) {
			fieldQuantity.val(1);
		} else {
			fieldQuantity.val(--numQuantity);
		}
	// calculate the price 
		var pricePerProduct = product.find('.price-after').val();
		pricePerProduct = parseInt(pricePerProduct);
		var totalPrice = pricePerProduct * numQuantity;

		product.find('.price2').html(totalPrice+ " VND");
		//sum all price of products
		var allProductPrice = $('.price2');
		var allPrice = 0;
		allProductPrice.each(function(){
			allPrice += parseInt($(this).text());
		});
		console.log(allPrice);
		$('.cart-total-price h3').html('Total:'+allPrice+' VND ');
	// send ajax to update  cart in server
		$.ajax({
			url: DOMAIN + "Cart/change",
			method: 'post',
			data: {
				id: productID ,
				quantity : numQuantity 
			}, 
			error: function(err){
				console.log(err);
			} , 
			success : function(data) {
				console.log(data);
			}
		});

	});
/*btn added quantity*/
	btnCartQuantityMore.click(function() {
		var product = $(this).parent().parent().parent();

		var productID = product.find('.product-id').val();

		var fieldQuantity = product.find('.cart-quantity-num input');
		var numQuantity = product.find('.cart-quantity-num input').val();
		
		if(numQuantity <= 0) {
			fieldQuantity.val(1);
		} else {
			fieldQuantity.val(++numQuantity);
		}
	// calculate the price 
		var pricePerProduct = product.find('.price-after').val();
		pricePerProduct = parseInt(pricePerProduct);

		var totalPrice = pricePerProduct * numQuantity;

		product.find('.price2').html(totalPrice + " VND");
		//sum all price of products
		var allProductPrice = $('.price2');
		var allPrice = 0;
		allProductPrice.each(function(){
			allPrice += parseInt($(this).text());
		});
		console.log(allPrice);
		$('.cart-total-price h3').html('Total:'+allPrice+' VND ');
	// send ajax to update  cart in server
		$.ajax({
			url: DOMAIN + "Cart/change",
			method: 'post',
			data: {
				id: productID ,
				quantity : numQuantity 
			}, 
			error: function(err){
				console.log(err);
			} , 
			success : function(data) {
				console.log(data);
			}
		});


	});
/* btn delete product from cart */
	btnDel.click(function() {
		var product = $(this).parent().parent().parent(); // return tr 
		
		var productID = parseInt(product.find('.product-id').val()); 
		// send ajax to server to update cart 
		$.ajax({
			url: DOMAIN + "Cart/del",
			method: "post", 
			data : {
				id : productID
			},
			dataType:'text',
			error : function(err) {
				console.log(err);
			} , 
			success : function(data) {
				// del product in view after delete from server  
				product.remove();
				
				if($('.cart tbody tr').length === 0 ) {
					$('#wrapper').html('<center><h1>You don\'t have any products </h1></center>');
				} 
				
			}
		});
	}); // end btnDel

/*
	click and change img product
*/

/*
	total price	
*/

	var cart = $('.cart');
	cart.change(function(){
		console.log('crt change');
	});
	
});