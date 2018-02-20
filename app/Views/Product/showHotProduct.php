<?php use App\Libs\Authorization; ?>

<?php foreach ($data['hotProduct'] as   $product) : ?>
 	<div class="hot-product  aqua-border">
 		<div class='hot-product-avatar'>
 			<img src="<?= DOMAIN."app/Models/productsImg/". $product['avatar']; ?>" class='img-inside'/>
 		</div>
 		<div class="hot-product-name"><?= $product['name']; ?></div>
 		<div class="hot-product-price"><?= $product['price']; ?></div>
 		<div class="hot-product-detail btn-buy" id-product="<?= $product['product_id']; ?>">
			<input type="button" name="" value="Details" class="btn btn-fullwidth  aqua-border">
		</div>
	<?php if(Authorization::isAdmin()) : ?>
		<div class="product-setting">
	 		<div class='product-setting-item'>
	 			<button class='product-del' id="<?= $product['product_id']; ?>">del</button>
	 		</div>
	 		<div class='product-setting-item'>
	 			<button><a href="<?= DOMAIN.'Product/update/'.$product['product_id']; ?>" class='link-inside'>update</a></button>
	 		</div>

	 		<div class='clear-fix'></div>
	 	</div>
 	<?php endif; ?>

 	</div>

 
 <?php endforeach; ?>
	<div class="clear-fix"></div>

<div class="pagination black-border">
	<?php $data['pagination']->pagHotProduct(); ?>
	<div class="clear-fix"></div>
</div>
