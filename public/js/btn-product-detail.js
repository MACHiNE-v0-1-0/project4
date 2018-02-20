
$("document").ready(function(){

	var hotProducts = $('.hot-product');
	hotProducts.hover(function() {
		var hotProductDetail = $(this).find('.hot-product-detail');
		var productSetting = $(this).find('.product-setting');

		hotProductDetail.show();
		productSetting.show();

		$(this).mouseleave(function() {
			hotProductDetail.hide();
			productSetting.hide();
		});
	});
	/*
		change img when click on each img 
	*/	
	var hotProductDetail = hotProducts.find('.hot-product-detail');
	hotProductDetail.click(function(){
		
		var hotIdProduct = $(this).attr('id-product');
		console.log(hotIdProduct);
		$.ajax({
			url:DOMAIN + 'Product/showDetail' ,
			method:'POST',
			data: {
				idProduct : hotIdProduct
			},
			dataType : 'json',
			error : function (jqXhr, textStatus, errorMessage){
				console.log('ajax err');
				console.log(errorMessage);
			},
			success : function (response, status ,xhr){
				console.log(response);
				console.log(typeof response);
				var data = response;
				// display product modal 
				var btnProductModal = $('#modal-product');
				btnProductModal.slideDown('slow');

				//set infomations into the modal
					var productId = $('.id-product');
					var productInfoName = $('.product-info-name h1');
					var productInfoAvailable = $('.product-info-available span');
					var productInfoCPU = $(".product-info-cpu");
					var productInfoRAM = $(".product-info-ram");
					var productInfoHDD = $(".product-info-hdd");
					var productInfoMonitor = $(".product-info-monitor");
					var productInfoVGA = $(".product-info-vga");
					var productInfoGuaranty = $('.product-info-guaranty');
					var productInfoPrice = $('.product-info-price .price');
					var productAvatar = $('.product-img-main img');
					var productSubImg = $('.product-img-sub');
				//set avatar //
					if(data.avatar === null) {
						productAvatar.attr('src', DOMAIN + "app/Models/productsImg/no-img.png" );
					} else {
						productAvatar.attr('src', DOMAIN + "app/Models/productsImg/" + data.avatar);
					}

					
				//set hidden id 
					productId.val(data.id);
				// set name
					productInfoName.html(data.name);
					console.log(data.name);
					nameProduct = data.name.toLowerCase();
				// set available
					
					if(data.available === 1) {
						productInfoAvailable.html(' có hàng ');
					} else {
						productInfoAvailable.html(" hết hàng ");
					}
				// set descriptions about product
					productInfoCPU.html("<i class='fa fa-caret-square-o-right'></i> CPU: " + data.cpu);
					productInfoRAM.html("<i class='fa fa-caret-square-o-right'></i> RAM: " + data.ram);
					productInfoHDD.html("<i class='fa fa-caret-square-o-right'></i> HDD: "+ data.hdd);
					productInfoMonitor.html("<i class='fa fa-caret-square-o-right'></i> Monitor: " + data.monitor);
					productInfoVGA.html("<i class='fa fa-caret-square-o-right'></i> VGA: " + data.vga);
					productInfoGuaranty.html("<i class='fa fa-caret-square-o-right'></i> Guaranty: " + data.guaranty);
					productInfoPrice.html(data.price + " VND");
					
				// set value of quantity 
					var fieldQuantity = $('.quantity');
					fieldQuantity.val(1);
				// set img for product
					//get name product 
					var nameFolderProduct = data.name.toLowerCase();

					$('.product-img-sub').html('');
					for(var i=0 ; i <data.imgs.length ;i++) {
						var div = $('<div></div>');
						var a = $("<a></a>");
						var img = $('<img>');

						a.addClass('link-inside');
						a.attr('href','#');

						div.addClass('product-img-sub-item');
						div.addClass('aqua-border');
						
						img.attr('src', DOMAIN + 'app/Models/products/'+nameFolderProduct+'/'+ data.imgs[i]);
						img.addClass('img-inside');

						img.appendTo(a);
						a.appendTo(div);
						div.appendTo($('.product-img-sub'));
					}
					$('.product-img-sub').append("<div class='clear-fix'></div>");
					$('.product-img-sub-item').ready(function(){
						var productSubItem = $('.product-img-sub');
						var subImg = productSubItem.find('.product-img-sub-item');

						subImg.click(function(){
							var container = $(this).parent().parent().parent();
							var mainImgContainer = container.find('.product-img-main');
							var mainImgPath = mainImgContainer.find('img').attr('src');

							var subImgPath = $(this).find('img').attr('src');

							var hold = mainImgPath;
							mainImgContainer.find('img').attr('src', subImgPath);
							$(this).find('img').attr('src', hold);


						});
					});

			}
		}); // end ajax 1 
	}); 


		

/*
	CLOSE MODAL PRODUCT
*/
	var btnCloseModalProduct = $('.btn-close-modal-product');
	btnCloseModalProduct.click(function(){
		var ModalProduct = $('#modal-product');
		if(ModalProduct.css('display') === 'block'){
			ModalProduct.slideUp('slow');
		}
	});



});