<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shop</title>
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>

</head>
<body>
	<header>
		<div id="head">
			<div class="top">
				<div class="width1024">
					<ul class="desktop-element">
						<li><a href="">Sign in</a></li>
						<li><a href="">My account</a></li>
						<li><a href="">Order Status</a></li>
						<li><a href="">Help</a></li>
					</ul>
					<div id="mobile-logo" class="mobile-element">BOOKS</div>
				<select id="top-link" onchange="document.location=this.value" class="mobile-element">
					<option disable selected></option>
					<option value="#sigin">Sign in</option>
					<option value="#account">My account</option>
					<option value="#order">Order Status</option>
					<option value="#help">Help</option>
				</select>
				</div>
			</div>
			<div class="header-panel">
				<div class="width1024 flex">
					<div id="logo">
						<a href="http://localhost/shop/frontend/index.php">
                            <img src="imgs/logo.png" alt="">
                        </a>
					</div>
					<div id="search-field">
						<form action="#" >
							<input type="text" name="search_text">
							<button>Search</button>
						</form>
					</div>
					<div id="basket-container">
						<div>Your cart <span>(2 items)</span></div>
						<div><b>$125.0</b><a href="#">Checkout</a></div>
					</div>
					<div id="favor">
						<div> Wish List </div>
					</div>
				</div>
			</div>		
		</div>
		<nav>
			<ul  class="width1024 desktop-element">
				<li><a href="#">Computers</a></li>
				<li><a href="#">Cooking</a></li>
				<li><a href="#">Educations</a></li>
				<li><a href="#">Function</a></li>
				<li class="active"><a href="#">Health</a></li>
				<li><a href="#">Mathematics</a></li>
				<li><a href="#">Medical</a></li>
				<li><a href="#">Reference</a></li>
				<li><a href="#">Science</a></li>
			</ul>
			<select onchange="document.location=this.value" class="mobile-element">
				<option disabled selected>
				<option value="#Computers">Computers
				<option value="#Cooking">Cooking
				<option value="#">Educations
				<option value="#">Functions
				<option value="#">Health
				<option value="#">Mathematics
				<option value="#">Medical
				<option value="#">Reference
				<option value="#">Science
			</select>
		</nav>
	</header>