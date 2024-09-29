<?php
require_once "config/db.php";
require_once "config/userAuth.php";

require_once "partials/html_head.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php renderHead("Finalize sua compra"); ?>
	<body>
		<?php require_once "partials/header.php"; ?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<div class="container">
				<div class="row">
					<nav aria-label="breadcrumb" class="col-md-12">
			  			<ol class="breadcrumb">
			    			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			    			<li class="breadcrumb-item active"><a href="checkout.php">Retirada</a></li>
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
				<div class="row">
					<form method="POST" action="controllers/formCheckoutController.php">
						<div class="col-md-7">
							<!-- Billing Details -->
							<div class="billing-details">
								<div class="section-title">
									<h3 class="title">Endereço de entrega</h3>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="name" placeholder="Nome completo">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="address" placeholder="Endereço">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="complement" placeholder="Complemento">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="bairro" placeholder="Bairro">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="city" placeholder="Cidade">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="state" placeholder="Estado">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="zip-code" placeholder="Cep">
								</div>
							</div>
							<!-- /Billing Details -->
						</div>

						<!-- Order Details -->
						<div class="col-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title">Seu pedido</h3>
							</div>
							<div class="order-summary">
								<div class="order-col">
									<div><strong>PRODUTO</strong></div>
									<div><strong>PREÇO</strong></div>
								</div>
								<div id="pedidos" class="order-products">
									
								</div>
								<div class="order-col">
									<div>Frete</div>
									<div><strong>GRÁTIS</strong></div>
								</div>
								<div class="order-col">
									<div><strong>TOTAL</strong></div>
									<div><strong id="total" class="order-total"></strong></div>
								</div>
							</div>
							<div class="payment-method">
								<div class="input-radio">
									<input type="radio" name="payment" id="payment-1">
									<label for="payment-1">
										<span></span>
										Boleto
									</label>
									<div class="caption">
										<p>Um boleto bancário será emitido para ser pago em qualquer banco à sua escolha, porém conta com uma taxa de gestão.</p>
									</div>
								</div>
								<div class="input-radio">
									<input type="radio" name="payment" id="payment-2">
									<label for="payment-2">
										<span></span>
										Rim
									</label>
									<div class="caption">
										<p>Você vai sentir uma leve picada no pescoço e, quando se der conta, acordará sedado em uma banheira de gelo.</p>
									</div>
								</div>
								<div class="input-radio">
									<input type="radio" name="payment" id="payment-3">
									<label for="payment-3">
										<span></span>
										Paypal
									</label>
									<div class="caption">
										<p>Simples, rápida e eficaz forma de pagamento, a única desvantagem é ter seus dados bancários roubados.</p>
									</div>
								</div>
							</div>
							<input type="submit" class="primary-btn order-submit" value="Finalizar pedido"/>
						</div>
						<!-- /Order Details -->
					</form>
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
		<script src="js/custom.js" type="module"></script>

	</body>
</html>
