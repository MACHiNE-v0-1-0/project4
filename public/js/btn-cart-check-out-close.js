$('#cart-check-out-modal').ready(function(){
	/*
		Close modal when clicked on close btn
	*/
		var btnCloseCheckOut = $('.check-out-btn-close button');
		btnCloseCheckOut.click(function(){
			$('#cart-check-out-modal').slideUp('fast');
		});
});