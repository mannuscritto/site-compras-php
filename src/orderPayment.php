<?php
require_once "config/db.php";
require_once "config/userAuth.php";

require_once "partials/html_head.php";
require_once "controllers/pedidos/pedidosController.php";

$pInfo = pedido_read($_GET['id']);

?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php renderHead("Confirmar pedido"); ?>
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
			<div class="container ">
				<!-- row -->
				<div class="row">
					<!-- ghost -->
					<div class="col-md-2">
					<!-- /ghost -->	
					</div>
					<div class="col-md-8">
                        <a name="finalize"><h1>Finalize seu pedido</h1></a>
						<?php include("partials/finalizacao.php") ?>
                        <a href="controllers/pedidos/imprimir.php?id=<?php echo $_GET['id'] ?>">Imprimir</a>
					</div>

					
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
