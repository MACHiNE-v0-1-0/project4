
<div id="main" class="black-border">
	<div id="hot-section" class="black-border">
		<h3 class="black-border">Hot Products:<span class="float-right">
			<a href="<?= DOMAIN.'Product/showHot'; ?>">View all!!</a>
			</span>
			<div class="clear-fix"></div>
		</h3>
		<div class="content">
			
			<?php foreach($data["hotProducts"] as  $product): ?>

				<div class="hot-product black-border" >
						<div class="hot-product-avatar">
							<img src="<?= DOMAIN."app/Models/productsImg/". $product['avatar']; ?>" class="img-inside">
							<div class='cart-sale-rate'>-<?= $product['rateSale']; ?> %</div>
						</div>
						
						<div class="hot-product-name"><?= $product['name']; ?></div>
						<div class="hot-product-price"> Price: <?= $product['price']; ?></div>
						<div class="hot-product-detail " id-product="<?= $product['product_id']; ?>">
							<input type="button" name="" value="Details" class="btn btn-fullwidth  aqua-border">
						</div>
				</div>
			
			<?php endforeach; ?>
			

			<div class="clear-fix"></div>
		</div> <!-- content -->
		
	</div> <!-- hot products -->

	<div id="trending-section" class="black-border">
		<h3 class="black-border">Trending Products:<span class="float-right">
			<a href="<?= DOMAIN.'Product/showTrending'; ?>">View all!!</a>
			</span>
			<div class="clear-fix"></div>
		</h3>
		<div class="content">
			
			<?php foreach($data["trendingProducts"] as  $product): ?>

				<div class="hot-product black-border" >
						<div class="hot-product-avatar">
							<img src="<?= DOMAIN."app/Models/productsImg/". $product['avatar']; ?>" class="img-inside">
							<div class='cart-sale-rate'>-<?= $product['rateSale']; ?> %</div>
						</div>
						
						<div class="hot-product-name"><?= $product['name']; ?></div>
						<div class="hot-product-price"> Price: <?= $product['price']; ?></div>
						<div class="hot-product-detail " id-product="<?= $product['product_id']; ?>">
							<input type="button" name="" value="Details" class="btn btn-fullwidth  aqua-border">
						</div>
				</div>
			
			<?php endforeach; ?>
			

			<div class="clear-fix"></div>
		</div> <!-- content -->
	</div> <!-- trending products -->
	
</div>

<div id="side-bar" class="black-border">
	<div class='content'>
		<div class="">
			<h4>post 1</h4>
		</div>
		<div class="">
			<h4>post 1</h4>
		</div>
		<div class="">
			<h4>post 1</h4>
		</div>
		<div class="">
			<h4>post 1</h4>
		</div>
	</div>
</div>

<div class="clear-fix"></div>