console.log("post product img");
$("document").ready(function(){

	var btnPostProductImg = $('#btn-post-product-img');
	

	btnPostProductImg.change(function(){
		var reader = new FileReader();

		reader.onload = function(e) {
			$('.area-product-img').html("<td></td>");
			$('.area-product-img').append("<td><img src='"+e.target.result+"' class='img-inside img-product'/></td>");
		}

		reader.readAsDataURL($(this)[0].files[0]);
	});
	
});