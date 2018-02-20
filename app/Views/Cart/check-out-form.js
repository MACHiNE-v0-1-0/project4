$('#cart-check-out-modal').ready(function(){
	var fieldName = $('#check-out-form-name');
	var fieldPhone = $('#check-out-form-phone');
	var fieldEmail = $('#check-out-form-email');
	var fieldAddress = $('#check-out-form-address');
	var fieldNote = $('#check-out-form-note');

	var fieldSubmit = $('#check-out-form-submit');


	fieldName.keyup(function(){
		var fieldNameErr = $('#check-out-form-name-err');
		if($(this).val().length === 0) {

		}
	});

});