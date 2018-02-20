$('document').ready(function() 
{
	var mainMenuProductItem = $('#main-menu-product-item');
	var mainMenuProductSubMenu = $('#product-sub-menu');
	mainMenuProductItem.mouseover(function()
	{
		mainMenuProductSubMenu.css('display', 'block');
	});

	mainMenuProductItem.mouseleave(function()
	{
		mainMenuProductSubMenu.css('display', 'none');
	});

	var productSubMenu2 = $('#product-sub-menu-2');
	mainMenuProductSubMenu.mouseover(function()
	{
		productSubMenu2.css('display', 'block');
	});

	mainMenuProductSubMenu.mouseleave(function()
	{
		productSubMenu2.css('display', 'none');
	});


	// btn contact 
	var menuContact = $('#main-menu-contact');
	// when is clicked then the site will be scrolled to footer
	menuContact.click(function() {
		
		$('html,body').animate({
       	 	scrollTop: $("#footer").offset().top
    	}, 2000);
	});


});