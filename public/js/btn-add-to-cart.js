$('document').ready(function() {

	var btnBuy = $('.btn-product-buy');

	var btnQuantity = $('.quantity');
	var btnMore = $('.quantity-more');
	var btnLess = $('.quantity-less');

	btnBuy.click(function(){
		var buySection =  $('.product-buying-buy');
		var idProduct = buySection.find('.id-product').val(); // get id of product //

		// get quantity of product
		var quantity = btnQuantity.val();
	//check if user has logged in 
		// if so then user can add product 
		// if not user must register

		$.ajax({
			url:DOMAIN + "User/isLogin",
			method:'post',
			dataType:'text',
			error : function (err){
				console.log(err);
			} ,
			success: function (data, textStatus, jqXHR){
				console.log(data);

				if(data === 'false'){
					alert("You must log in before you can buy anything!!");
					alert("Redirect to the main page");
					setTimeout(function(){
						window.location.replace(DOMAIN);
						return false;
					},2000);
				} else {
					$.ajax({
						url:DOMAIN + 'Cart/add',
						method:'post',
						dataType: 'text', //  type of returned data
						data: {
							id : idProduct,
							numQuantity : quantity
						} , 
						error : function (err){
							console.log(err);
						} ,
						success: function (data, textStatus, jqXHR){
							alert(data);
						}
					});
				}
			}
		});

		
		
		
	});

	

	btnMore.click(function(){

		var value = btnQuantity.val();
		++value;
		btnQuantity.val(value);
		
	});

	btnLess.click(function(){
		var value = btnQuantity.val();
		if(value <= 0 ) {
			btnQuantity.val(1);
			return false;
		} else {
			--value;
			btnQuantity.val(value)
			return true;
		}
	});
});// end 