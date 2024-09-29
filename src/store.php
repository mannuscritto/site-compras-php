<?php
require_once "config/db.php";
require_once "config/userAuth.php";

require_once "partials/html_head.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php renderHead("Veja todos os nossos produtos"); ?>
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
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="store.php">Categorias</a></li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categorias</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox">
									<input type="checkbox" id="category-1" data-cat="1">
									<label for="category-1">
										<span></span>
										Low End
										<small></small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-2" data-cat="2">
									<label for="category-2">
										<span></span>
										Mid End
										<small></small>
									</label>
								</div>

								<div class="input-checkbox category">
									<input type="checkbox" id="category-3" data-cat="3">
									<label for="category-3">
										<span></span>
										High End
										<small></small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Marca</h3>
							<div class="checkbox-filter" id="brand-filter">
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store products -->
						<div class="row" id="resultados">

						</div>

						<!-- store bottom filter -->
						<div class="store-filter clearfix" id="paginacao">
							
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
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
