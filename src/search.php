<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Resultados da busca por </title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

 		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 		<!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->

    </head>
	<body onload="carregarBusca()">
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> (17) 3566-7525</a></li>
						<li><a href="mailto:contato@placas-video.com.br"><i class="fa fa-envelope-o"></i> contato@placas-video.com.br</a></li>
						<li><a href="https://www.google.com.br/maps/place/Catanduva,+SP/@-21.148862,-49.046002,12z/data=!3m1!4b1!4m5!3m4!1s0x94bc1e6b7f228597:0x2af440e5dd0adb6e!8m2!3d-21.1312077!4d-48.9777194"><i class="fa fa-map-marker"></i> Rua do Comércio, 1080</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li id="link_conta"><a href="formLogin.html" id="user_link"><i class="fa fa-user-o"></i> <span id="user_name"></span></a></li>
						<li onclick="logoff()"><a href=""><span id="exit_user"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</span></a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="LOGO GRAFIK">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="search.html">
									<select class="input-select" name="cat" id="select-cat">
										<option value="0">Tudo</option>
										<option value="1">Low End</option>
										<option value="2">Mid End</option>
										<option value="3">High End</option>
									</select>
									<input class="input" placeholder="Pesquise por modelos, fabricantes..." name="q" id="termos">
									<button type="submit" class="search-btn">Pesquisar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="favoritos.html">
										<i class="fa fa-heart-o"></i>
										<span>Favoritos</span>
										<div id="nro_fav" class="qty"></div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div>
									<a href="checkout.php">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrinho</span>
										<div id="nro_cart" class="qty"></div>
									</a>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<div class="container">
				<div class="row">
					<nav aria-label="breadcrumb" class="col-md-12">
			  			<ol class="breadcrumb">
			    			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			    			<li class="breadcrumb-item active" id="bread_model">Pesquisa</li>
			  			</ol>
					</nav>
				</div>
			</div>
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row" id="resultados">
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Sobre nós</h3>
								<p>Vendemos produtos de qualidade por um preço justo, priorizando os clientes e fazendo promoções para abaixar os preços.</p>
								<ul class="footer-links">
									<li><a href="https://www.google.com.br/maps/place/Catanduva,+SP/@-21.148862,-49.046002,12z/data=!3m1!4b1!4m5!3m4!1s0x94bc1e6b7f228597:0x2af440e5dd0adb6e!8m2!3d-21.1312077!4d-48.9777194"><i class="fa fa-map-marker"></i>Rua do Comércio, 1080</a></li>
									<li><a href="#"><i class="fa fa-phone"></i> (17) 3524-7525</a></li>
									<li><a href="mailto:contato@placas-video.com.br"><i class="fa fa-envelope-o"></i>contato@placas-video.com.br</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categorias</h3>
								<ul class="footer-links">
									<li><a href="store.php">Low End</a></li>
									<li><a href="store.php">Mid End</a></li>
									<li><a href="store.php">High End</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Informação</h3>
								<ul class="footer-links">
									<li><a href="index.php">Sobre nós</a></li>
									<li><a href="checkout.php">Contato</a></li>
									<li><a href="index.php">Política de Privacidade</a></li>
									<li><a href="checkout.php">Pedidos e Devoluções</a></li>
									<li><a href="index.php">Termos e Condições</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Serviço</h3>
								<ul class="footer-links">
									<li><a href="store.php">Conta</a></li>
									<li><a href="checkout.php">Carrinho</a></li>
									<li><a href="checkout.php">Favoritos</a></li>
									<li><a href="product.php">Rastrear pedido</a></li>
									<li><a href="index.php">Ajuda</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/custom.js"></script>

	</body>
</html>
