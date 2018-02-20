
<div id='register-form'>
<center>
	<h2>Register</h2>
	<p>(*) fields must be filled</p>
	<form action="<?= DOMAIN."User/registering" ?> " method="POST" id="reg-form">
		<table>
			<tr>
				<td>Username(*):</td>
				<td><input type="text" name="reg-username" id="reg-username" required></td>
			</tr>
			<tr>
				<td colspan="2" id="err-reg-username"  class='err-reg'></td>
			</tr>
			<tr>
				<td>Password(*):</td>
				<td><input type="password" name="reg-password" id="reg-password" required></td>
			</tr>
			<tr>
				<td colspan="2" id="err-reg-password" class='err-reg'></td>
			</tr>
			<tr>
				<td>Re-Password(*):</td>
				<td><input type="password" name="reg-repassword" id="reg-repassword" required></td>
			</tr>
			<tr>
				<td colspan="2" id="err-reg-repassword" class='err-reg'></td>
			</tr>
			<tr>
				<td>Email(*):</td>
				<td><input type="email" name="reg-email" id="reg-email" required></td>
			</tr>
			<tr>
				<td colspan="2" id="err-reg-email" class='err-reg'></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="reg-submit" id="reg-submit"></td>
			</tr>
		</table>
	</form>

</center>
</div>