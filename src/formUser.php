<?php
require_once "config/db.php";
require_once "config/userAuth.php";

require_once "partials/html_head.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php renderHead("Cadastre-se hoje em nosso site!"); ?>
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
						<form name="formulario" action="controllers/formUserController.php" method="POST">
							<!-- Billing Details -->
						<div class="billing-details" name="divInterna" id="divInterna">
							<div class="section-title">
								<h3 class="title">Cadastro do cliente</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="nomecompleto" id="firstName" placeholder="Nome Completo" required>
							</div>
								<div class="section-title" id="erroNome"></div>
						
							<div class="form-group">
								<input class="input" type="email" name="email" id="email" placeholder="Email" required>
							</div>
								<div class="section-title" id="erroEmail"></div>

							<div class="form-group">
								<input class="input" type="password" name="senha" id="senha" placeholder="Senha" requried>
							</div>
								<div class="section-title" id="erroSenha"></div>
							
							<div class="form-group">
								<input class="input" type="password" name="cSenha" id="Csenha" placeholder="Confirme a senha" required>
							</div>
								<div class="section-title" id="erroCsenha"></div>
							<div class="section-title" id="cadastroSucesso"></div>
							
							<input type="submit" class="primary-btn order-submit" name="btnEnviar" id="btnEnviar" value="Cadastrar">
							
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
