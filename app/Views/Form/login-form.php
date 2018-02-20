

<center>
	<h1 id="login-title">Login!...</h1>
<form action="<?= DOMAIN."User/loggingIn"; ?>" method="post" id="login-form">
	<table>
		<tr>
			<td id="label-username">Username:</td>
			<td><input type="text" name="login-username" id="login-username" required="required"></td>
			<td id="login-err-username" class="red-text"></td>
		</tr>
		<tr>	
			<td id="label-password">Password:</td>
			<td><input type="password" name="login-password" id="login-password" required="required"></td>
			<td id="login-err-password" class="red-text"></td>
		</tr>
		<tr>
			
			<td colspan="2"><input type="submit" name="submit-login" value="Login!!" id="submit-login" class='btn-fullwidth'></td>
		</tr>
	</table>
</form>
</center>