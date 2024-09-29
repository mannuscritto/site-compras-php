<?php
require_once "config/db.php";
require_once "config/userAuth.php";

require_once "partials/html_head.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php renderHead("Faça login em nosso site"); ?>
	<body>
		<?php require_once "partials/header.php"; ?>

		<!-- SECTION -->
		<div class="section ">
			<!-- container -->
			<div class="container ">
				<!-- row -->
				<div class="row">
					<!-- ghost -->
					<div class="col-md-2">
					<!-- /ghost -->	
					</div>
					<div class="col-md-8">
						<form name="formularioLogin" action="controllers/formLoginController.php" method="POST" onsubmit="">
							<!-- Billing Details -->
						<div class="billing-details" name="divInterna" id="divInterna">
							<div class="section-title">
								<h3 class="title">Login</h3>
							</div>
							<div class="form-group">
								<input class="input" type="email" name="emailLogin" id="emailLogin" placeholder="Email" required>
							</div>
								
							<div class="form-group">
								<input class="input" type="password" name="senhaLogin" id="senhaLogin" placeholder="Senha" >
							</div>
								<div class="section-title" id="erroSlogin"></div>	
							
							<input type="submit" class="primary-btn order-submit" name="btnEnviar" id="btnEnviar" value="Logar">
							<div class="section-title" id="loginSucesso"></div>

							<a href="formUser.php"  class="store-grid">Não tem cadastro ainda ? Cadastre-se</a>
							
							
							
						</div>
						<!-- /Billing Details -->

							
						</form>
						
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
		<script type="text/javascript" src="js/custom.js"></script>

	</body>
</html>
	