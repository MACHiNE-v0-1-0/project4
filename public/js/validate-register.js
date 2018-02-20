
console.log('valiedate-reg');

$("document").ready(function(){
	var reg_submit = $('#reg-submit');
	var reg_username = $('#reg-username');
	var reg_password = $('#reg-password');
	var reg_repassword =$('#reg-repassword');
	var reg_email = $('#reg-email');

	var err_reg_username = $('#err-reg-username');
	var err_reg_password = $('#err-reg-password');
	var err_reg_repassword = $('#err-reg-repassword');
	var err_reg_email = $('#err-reg-email');

	var no_err = false;
	$('#reg-form').keyup(function(){

		if(reg_username.val().length === 0){
			err_reg_username.text("Username can't be blank");
			no_err = false;
		} else {
			err_reg_username.text("");
			no_err = true;
		}

		if(!isNaN(reg_username.val()[0])){
			err_reg_username.text("Username must begin with a character");
			no_err = false;
		} else {
			err_reg_username.text("");
			no_err = true;
		}

		if(reg_username.val().length < 6 || reg_username.val().length > 12){
			err_reg_username.text("Username length must be in 6 to 12 character");
			no_err = false;
		}else {
			err_reg_username.text("");
			no_err = true;
		}

		if(reg_password.val().length === 0){
			err_reg_password.text('Password can\'t be blank');
				no_err = false;
		} else {
			err_reg_password.text('');
			no_err = true;
		}

		if(reg_repassword.val().length === 0){
			err_reg_repassword.text('Re-password can\'t be blank');
			no_err = false;
		} else {
			err_reg_repassword.text('');
			no_err = true;
		}

		if(reg_repassword.val() !== reg_password.val()){
			err_reg_repassword.text('Re-password is not the same as password');
			no_err = false;
			} else {
				err_reg_repassword.text('');
				no_err = true;
			}

		if(reg_email.val().length === 0){
			err_reg_email.text('Email can\'t be blank');
			no_err = false;
		} else {
			err_reg_email.text('');
			no_err = true;
		}
		//
		var regexEmail = /^[^\d\s]\w{1,12}@(gmail|hotmail|yahoo)\.com/i;
		if(regexEmail.test(reg_email.val())){ 
			err_reg_email.text('');
			no_err = true;
		} else {
			err_reg_email.text('Email is not valid');
			no_err = false;
		}
	// if all conditions are met then displat submit btn
		if(no_err === true){
			reg_submit.css("display","inline-block");
		} else {
			reg_submit.css('display','none');
		}

		
	});
});