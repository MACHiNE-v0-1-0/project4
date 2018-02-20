$('document').ready(function(){
	var btnProductDel = $('.product-del');
	btnProductDel.click(function(){
		var box = $(this);
		var idProduct = $(this).attr('id');
		$.ajax({
			url:DOMAIN + "Product/del",
			method:"post",
			dataType:'text',
			data:{
				id: idProduct
			},
			error: function(err){
				console.log(err);
			},
			success : function(res){
				console.log(res);
				box.parent().parent().parent().remove();
			}
		}); // end ajax

	});



});