
$("document").ready(function(){
	var btnUser = $('#user');

	btnUser.mouseover(function(){
		var btnMenu = $("#menu").slideDown('fast');
		$(this).mouseleave(function(){
			btnMenu.hide();
		});
	});
});