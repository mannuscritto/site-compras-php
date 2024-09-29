<?php
require_once "config/db.php";
require_once "config/userAuth.php";

require_once "partials/html_head.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php renderHead("Página Inicial") ?>
	<body>
		<?php require_once "partials/header.php"; ?>

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="store.php">Categorias</a></li>
					</ul>
					<!-- /NAV -->

					<p id="demo"></p>

				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/produtos_cachorro.png" alt="Produtos">
							</div>
							<div class="shop-body">
								<h3>PRODUTOS DE CACHORRO</h3>
								<a href="product.php" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/produtos_gato.png" alt="Produtos">
							</div>
							<div class="shop-body">
								<h3>PRODUTOS DE GATO</h3>
								<a href="product.php" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->

					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div id="secao1" class="row">

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Dias</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Horas</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Minutos</span>
									</div>
								</li>
								<li>
									<div>
										<h3>59</h3>
										<span>Segundos</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Promoção da semana</h2>
							<p>Nova linha com 15% de desconto</p>
							<a class="primary-btn cta-btn" href="product.html">Comprar</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div id="secao2" class="row">
					
				</div>							
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<?php require_once "partials/footer.php"; ?>

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
		<script src="./js/custom.js" type="module"></script>

	</body>
</html>
