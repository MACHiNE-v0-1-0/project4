console.log("validate-submit ");

$("document").ready(function(){

	var form = $("#login-form");
	var submit = $('#submit-login');

	var username = $('#login-username');
	var password = $('#login-password');

	var err_username = $('#login-err-username');
	var err_password = $('#login-err-password');

	var flag = false;

	form.keyup(function(){
		username.keyup(function(){
		if(username.val().length === 0){
			err_username.text(" WARNING: Username can't be blank");
			flag = false;
		} else {
			err_username.text("");
			flag = true;
		}
		});
	
		password.keyup(function(){
			if(password.val().length === 0){
				err_password.text("WARNING: Password can't be blank");
				flag = false;
			} else {
				err_password.text("");
				flag = true;
			}
		});

		if(flag === true){
			submit.css("display", "inline-block");
			submit.fadeIn(500);
		} else {
			submit.fadeOut(500);
		}
	});
	
		




});