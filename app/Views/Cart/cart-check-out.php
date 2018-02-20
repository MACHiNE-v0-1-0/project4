
<div id="cart-check-out-modal">
	<div id="cart-check-out-modal-wrapper">
	<div class='check-out-head aqua-border'>
		<div class='check-out-head-title float-left'>
			Thông tin thanh toán
		</div>
		<div class='check-out-btn-close float-right'>
			<button><i class='fa fa-window-close'></i> Close!</button>
		</div>
		<div class='clear-fix'></div>
	</div> <!-- /modal head -->
	<div class='check-out-body black-border'>
		<h4>
			Để tiếp tục đặt hàng, quý khách xin vui lòng đăng nhập hoặc nhập thông tin bên dưới..!
		</h4>
		<form action="<?= DOMAIN.'Cart/checkOut';?>" method="post" id="cart-check-out-form" class='black-border'>
			<div>
				<div >Tên người nhận*</div>
				<div >
					<input type="text" name="check-out-form-name" id="check-out-form-name" required>
					<span id='check-out-form-name-err'></span>
				</div>
			</div>
			<div>
				<div >Số điện thoại *</div>
				<div >
					<input type="text" name="check-out-form-phone" id='check-out-form-phone' autocomplete='phone' required>
					<span id='check-out-form-name-err'></span>
				</div>
			</div>
			<div>
				<div >Email (Vui lòng điền chính xác)*</div>
				<div >
					<input type="text" name="check-out-form-email"  id='check-out-form-email' autocomplement='email' required>
					<span id='check-out-form-name-err'></span>
				</div>
			</div><br>
			<div>
				<div >Địa chỉ giao hàng *</div>
				<div >
					<input type="text" name="check-out-form-address" id='check-out-form-address' required>
					<span id='check-out-form-name-err'></span>
				</div>
			</div>
			<div>
				<div >Ghi chú</div>
				<textarea form ='cart-check-out-form' rows='10' name='check-out-form-note' id='check-out-form-note' cols='100%'></textarea>
			</div>
			<div>
				<input type="submit" name="check-out-form-submit" value='Xác nhận !.. ' id='check-out-form-submit' class='btn btn-fullwidth'>
			</div>
		</form>
	</div> <!-- /modal body -->

	</div> <!-- /Cart check out modal wrapper -->
</div>

<script type="text/javascript" rel='stylesheet' src=<?= DOMAIN. 'app/Views/Cart/check-out-form.js'; ?>>
	
</script>

<script type="text/javascript" rel='stylesheet' src=<?= DOMAIN. 'public/js/btn-cart-check-out-close.js'; ?>>
	
</script>