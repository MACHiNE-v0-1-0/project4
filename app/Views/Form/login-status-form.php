
	<?php if($data): ?>
		<h1>Login successfully .. Redirecting to mainpage</h1>
		<div id="login-status">
			<img src="<?= DOMAIN.'public/img/login-status-loading.gif'; ?>" class='img-inside'>
		</div>
		<script type="text/javascript" rel="stylesheet" src=<?= DOMAIN.'app/Views/assets/js/login-success.js'?>></script>
	<?php else: ?>
		<h1>Login Failed ... Return to login page</h1>
		<div id='login-status'>
			<img src="<?= DOMAIN.'public/img/login-status-loading.gif'; ?>" class='img-inside'>
		</div>
		<script type="text/javascript" rel="stylesheet" src=<?= DOMAIN.'app/Views/assets/js/login-fail.js'?>></script>
	<?php endif; ?>