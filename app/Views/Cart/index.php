<?php if(is_string($data['product'])): ?>
	<center>
		<h1>
			<?= $data['product']; ?>
		</h1>
	</center>
<?php else : ?>


<table class='cart aqua-border'>

<?php foreach($data['product'] as $product): ?>
	
	<tr class='cart-product'> <!-- each tr  will be a product !-->
		<input type="hidden" name="" class='product-id' value="<?= $product['product_id'];?>">
		<td class='cart-avatar'>
			<img src="<?= DOMAIN.'app/Models/productsImg/'.$product['avatar']; ?>" 
			class='img-inside' />
			<div class="cart-sale-rate">-<?= $product['rateSale']; ?> %</div>
		</td>

		<td class='cart-name'>
			<p><?= $product['name']; ?></p>
		</td>

		<td class='cart-price'>
			<?php if($product['price'] === $product['price2']): ?>
				<p class="price-original"><?= $product['price']; ?> VND</p>
			<?php else: ?>
				<p class='price1'><?= $product['price']; ?> VND</p>
				<p class='price2'><?= $product['price2']; ?> VND</p>
				<input type="hidden" name="" value="<?= $product['price2']; ?>" class='price-after'>
			<?php endif; ?>
		</td>

		<td class='cart-quantity'>
			<div class='cart-quantity-more float-left'>
				<input type="button" name="" value="+" class='btn-fullwidth'>
			</div>

			<div class='cart-quantity-num float-left'>
				<input type="number" name="" disabled value="<?= $product['quantity']; ?>" min="1" max="10" class='btn-fullwidth'>
			</div>

			<div class="cart-quantity-less float-left">
				<input type="button" name="" value="-" class='btn-fullwidth'>
			</div>
			<div class='clear-fix'></div>
		</td>

		<td class='cart-del'>
			<div>
				<button class='btn btn-fullwidth btn-fullheight btn-cart-del'>
					<a href="#" class='link-inside link-nounderline'>Remove</a>
				</button>
			</div>
		</td>
	</tr>
	
<?php endforeach; ?>

</table>
	<div class="cart-total-price aqua-border">
		<h3>Total: </h3>
		<div class='cart-check-out float-right aqua-border'>
			<button><i class='fa fa-cart-arrow-down'></i>&nbsp;Check out..!</button>
		</div>
		<div class='clear-fix'></div>
	</div>
<?php endif; ?>