<div id="post-product-form">
<h2>Post your product in here </h2>
<form action='<?= DOMAIN."Product/posting"; ?>' method='post' enctype='multipart/form-data'>
	<center>
	<table>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="post-product-name" required></td>
		</tr>

		<tr>
			<td>CPU:</td>
			<td><input type="text" name="post-product-cpu" required></td>
		</tr>

		<tr>
			<td>RAM: </td>
			<td><input type="number" name="post-product-ram" required></td>
		</tr>

		<tr>
			<td>HDD: </td>
			<td><input type="number" name="post-product-hdd" required></td>
		</tr>

		<tr>
			<td>Monitor: </td>
			<td><input type="text" name="post-product-monitor" required></td>
		</tr>

		<tr>
			<td>VGA: </td>
			<td><input type="text" name="post-product-vga" required></td>
		</tr>

		<tr>
			<td>guaranty: </td>
			<td><input type="text" name="post-product-guaranty" required></td>
		</tr>

		<tr>
			<td>price: </td>
			<td><input type="number" name="post-product-price" min='1' required> dong</td>
		</tr>

		<tr>
			<td>Rate of sale: </td>
			<td><input type="number" name="post-product-ratesale" min='0' max='100' required> %</td>
		</tr>

		<tr>
			<td>Sold date: </td>
			<td><input type="date" name="post-product-solddate" required></td>
		</tr>

		<tr>
			<td>Imgs: </td>
			<td>
				<input type="file" name="post-product-img" value="" id="btn-post-product-img" class="btn btn-fullwidth" multiple >
			</td>
		</tr>

		<tr class="area-product-img"> </tr>

		<tr>
			<td colspan="2"><input type="submit" value="POST Product!!" class="btn btn-fullwidth" name='post-product-submit'></td>
		</tr>
	</table>
	</center>
</form>

</div>