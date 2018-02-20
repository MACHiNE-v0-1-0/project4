<?php
	use App\Libs\Session;
	use App\Libs\Authorization;
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
    <script src="http://localhost/project4/public/js/jquery-3.2.1.js" rel="stylesheet" type="text/javascript"></script>

   <!-- Favicon -->
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php 
		$this->loadDefaultCss();
	?>
</head>
<body>

<!-- Modal : Product Details  -->
	<div id="modal-product" class="black-border">
		<div class="modal-header"> <!-- MODAL HEADER-->
			<div class='product-modal-title float-left'>Product details: </div>
			<input type="button" name="" value="CLOSE" class="btn btn-close-modal-product">
		</div> <!-- /MODEL HEADER -->
		
		<div class='clear-fix'></div>
		
		<div class="modal-main">
			<div class="product-img aqua-border float-left">
				<div class="product-img-main">
					<img src="#" class="img-inside">
				</div>
				<div class="product-img-sub">
				</div>
			</div>

			<div class="product-info aqua-border float-left">
				<div class="product-info-name"><h1></h1></div>
				
				<div class="product-info-available">
					<h4>Tình trạng :<span></span></h4>
				</div>

				<div class="product-info-sumary">
					<div class="product-info-cpu"> </div>
					<div class="product-info-ram"> </div>
					<div class="product-info-hdd"> </div>
					<div class="product-info-monitor"> </div>
					<div class="product-info-vga"> </div>
				</div>

				<div class="product-info-guaranty"> </div>
				<div class="product-info-price">Giá bán :  <span class='price'></span> <span style="color:gray; font-size: 16px;">[Giá đã có VAT]</span> 
				</div>
			</div>

			<div class="product-buying aqua-border float-left">
				
				<div class="product-buying-quantity">
					<input type="button" name="" value="+" class="quantity-more">
					<input type="number" name="" value="" class='quantity' placeholder="Nhap so luong san pham">
					<input type="button" value="-" class='quantity-less'/>
				</div>
				<div class="product-buying-buy">
					<input type="hidden" value="" class="id-product">
					<input type="button" name="" value="Add to Cart!" class='btn-product-buy btn-fullwidth'>
				</div>
				<hr class='green-horizon'>
				<div class='product-buying-inform'>
					<center><h2>YÊN TÂM MUA SẮM TẠI ...!</h2></center>
					<div>
						<span><i class='fa fa-flag'></i></span> &nbsp;Giao hàng miễn phí lên tới 150km
					</div>
					<div>
						<span><i class='fa fa-flag'></i></span> &nbsp;Thanh toán thuận tiện
					</div>
					<div>
						<span><i class='fa fa-flag'></i></span> &nbsp;Sản phẩm 100% chính hãng
					</div>
					<div>
						<span><i class='fa fa-flag'></i></span> &nbsp;Bảo hành tại nơi sử dụng
					</div>
					<div>
						<span><i class='fa fa-flag'></i></span> &nbsp;Giá cạnh tranh nhất thị trường
					</div>	
				</div>
			</div>
			<div class="clear-fix"></div>
		</div> <!-- WRAPPER -->
	</div> <!-- /Product details -->


<!-- NAV -->
	<nav>
		<div id="main-logo" class="nav-item ">
			<a href="<?= DOMAIN; ?>" id="" >
				<img src="<?= DOMAIN. "public/img/main-logo.gif";?>" class="img-inside" alt="HOME PAGE">
			</a>
		</div>

		<div id="search-box" class="nav-item">
			<input type="text" name="" placeholder="Search!">
		</div> 
	<?php if(Authorization::isLogin()): ?>
		<div id="logout" class='nav-item black-border'>
			<a href="<?= DOMAIN.'User/loggingOut';?>"; > <i class='fa fa-sign-out'></i> Logout!</a>
		</div>

		<div id="user" class="nav-item black-border">
			<a href="#" class='link-inside link-nounderline user-name'>
				<i class='fa fa-address-card'></i> <?= Session::get('user')['username']; ?>&nbsp;<i class='fa fa-arrow-circle-down'></i>
			</a>
			<div id="menu" class="aqua-border">
				<div id="cart" class="menu-item" >
					<a href="<?= DOMAIN."Cart/"; ?>" class='link-inside link-nounderline'>
						<i class='fa fa-shopping-cart'></i>  My cart!
					</a>
					<div id='cart-menu'>
						<div class="cart-menu-del black-border">
							<a href="<?= DOMAIN.'Cart/delAll'; ?>" class='link-inside'> Delete</a>
						</div>
						<div class="cart-menu-check-out-history black-border">
							<a href="<?= DOMAIN.'Cart/checkOutHistory'; ?>" class='link-inside'> Check Out History</a>
						</div>
					</div>
				</div> <!-- /Cart -->
				<div id='user-info' class='aqua-border menu-item'>
					<a href='<?= DOMAIN.'UpdateProfile'; ?>' class='link-inside link-nounderline'>
						<i class='fa fa-drivers-license'></i> Update profile
					</a>
				</div> <!-- update info -->
				<?php if(Authorization::isAdmin()) :?>
					<div id="post-product" class="menu-item menu-item-important">
						<a href="<?= DOMAIN.'Product/post'; ?>" class='link-inside link-nounderline'>
							<i class='fa fa-edit'></i> Post Product
						</a>
					</div>
				<?php endif; ?>
			</div> <!-- MENU -->
		</div>	
		
	<?php else: ?>
		<div id="register" class="nav-item ">
			<a href="<?= DOMAIN.'User/register'; ?>"><i class='fa fa-pencil-square'></i> Register</a>
		</div>	

		<div id="login" class="nav-item ">
			<a href="<?= DOMAIN."User/login"; ?>"><i class='fa fa-sign-in'></i> Login</a>
		</div>	
	<?php endif; ?>	

	</nav> <!-- /NAV -->
	
	<hr class="green-horizon black-border">

<!-- Main menu -->
	<div id='main-menu' class=''>
		<div class='float-left main-menu-item'>
			<a href='<?= DOMAIN ?>' class='link-inside link-nounderline'>Home</a>
		</div>
		<div class='float-left main-menu-item'>
			<a href='#' class='link-inside link-nounderline'>About us</a>
		</div>
		<div class='float-left main-menu-item' id='main-menu-product-item'>
			<a href='#' class='link-inside link-nounderline'>Products</a>
			<div id='product-sub-menu' class='aqua-border'>
				<div id='product-sub-menu-wrapper'>
					<a href='#' class='link-nounderline link-inside'>Laptop</a>
					<div id="product-sub-menu-2" class='red-border'>
						<div>
							<a href='#' class='link-inside'>Acer</a>
						</div>
						<div>
							<a href='#' class='link-inside'>Apple</a>
						</div>
						<div>
							<a href='#' class='link-inside'>Asus</a>
						</div>
						<div>
							<a href='#' class='link-inside'>Dell</a>
						</div>
						<div>
							<a href='#' class='link-inside'>Lenovo</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class='float-left main-menu-item'>
			<a href='#' class='link-inside link-nounderline'>News</a>
		</div>
		<div class='float-left main-menu-item' id="main-menu-contact">
			<a href='#' class='link-inside link-nounderline'>Contact</a>
		</div>
		<div class='clear-fix'></div>
	</div> <!-- /Main menu -->

	<hr class="green-horizon black-border">
	<div id="wrapper" class="black-border">