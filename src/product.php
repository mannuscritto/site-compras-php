<?php
require_once "config/db.php";
require_once "config/userAuth.php";

require_once "partials/html_head.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php renderHead("Veja mais detalhes sobre o produto"); ?>
	<body>
		<?php require_once "partials/header.php"; ?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<div class="container">
				<div class="row">
					<nav aria-label="breadcrumb" class="col-md-12">
			  			<ol class="breadcrumb">
			    			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			    			<li class="breadcrumb-item"><a href="store.php">Categorias</a></li>
			    			<li class="breadcrumb-item"><a href="store.php" id="bread_categ_link"></a></li>
			    			<li class="breadcrumb-item active" id="bread_model"></li>
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
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
                    			<img src="./img/Placa de Vídeo Aorus NVIDIA GeForce RTX 2080 Super.jpg">
            				</div>

            				<div class="product-preview">
                    			<img src="./img/Placa de Vídeo Aorus NVIDIA GeForce RTX 2080 Super.jpg">
            				</div>

            				<div class="product-preview">
                    			<img src="./img/Placa de Vídeo Aorus NVIDIA GeForce RTX 2080 Super.jpg">
            				</div>

            				<div class="product-preview">
                    			<img src="./img/Placa de Vídeo Aorus NVIDIA GeForce RTX 2080 Super.jpg">
            				</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
                    			<img src="./img/Placa de Vídeo Aorus NVIDIA GeForce RTX 2080 Super.jpg">
            				</div>

            				<div class="product-preview">
                    			<img src="./img/Placa de Vídeo Aorus NVIDIA GeForce RTX 2080 Super.jpg">
            				</div>

            				<div class="product-preview">
                    			<img src="./img/Placa de Vídeo Aorus NVIDIA GeForce RTX 2080 Super.jpg">
            				</div>

            				<div class="product-preview">
                    			<img src="./img/Placa de Vídeo Aorus NVIDIA GeForce RTX 2080 Super.jpg">
            				</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name" id="prod_nome"></h2>
							<div>
								<div class="product-rating" id="prod_nota">
									
								</div>
								<a class="review-link" href="#"><span id="prod_nro_avaliacoes"></span> Avaliações(s) | Adicione sua Avaliação</a>
							</div>
							<div>
								<h3 class="product-price"><span id="prod_preco"></span> <del class="product-old-price" id="prod_preco_base"></del></h3>
								<span class="product-available" id="prod_disp"></span>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
									QTD
									<div class="input-number">
										<input type="number" id="input_qtd">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<button class="add-to-cart-btn" id="cart-btn"><i class="fa fa-shopping-cart"></i> Adicionar ao carrinho</button>
							</div>
						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Descrição</a></li>
								<li><a data-toggle="tab" href="#tab2">Detalhes</a></li>
								<li><a data-toggle="tab" href="#tab3">Avaliações (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>Menos calor significa mais desempenho; nossos engenheiros em resfriamento otimizaram ainda mais o dissipador de calor das placas gráficas para permitir um maior desempenho da refrigeração. Conta com um conjunto de abas de alumínio maiores e mais largas, que se combina com cinco tubos de condução de calor de 8 mm, que funcionam de maneira harmônica para extrair mais calor que os designs de gerações anteriores.</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Apresentamos Active Fan Control, que possibilita ventiladores mais inteligentes. Conta com dois controladores de ventilador individuais, que permitem aos usuários ajustar a rotação dos ventiladores de maneira independente e aplicar maior fluxo de ar só onde e quando seja necessário; isto ajuda a diminuir o ruído geral e aumenta a vida útil, ao passo que mantém as condições de resfriamento e o rendimento é mais potente. Tudo se faz automaticamente, você não precisa fazer nada.</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.9</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													<li>
														<div class="review-heading">
															<h5 class="name">Lucas</h5>
															<p class="date">30 Outubro 2019, 03:57 AM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Essa placa é muito boa, nem lembro como consegui dinheiro pra comprar, acho que estou sonhando! :)</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">Gabriel</h5>
															<p class="date">25 Outubro 2018, 15:43 </p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>RTX 2080 TI Destruidora, tá Cuspindo fps no LOLzinho em 8k</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">João</h5>
															<p class="date">29 Outubro 2018, 20:50 </p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Essa placa tá rodando meu Don't Starve e o Minecraft sem nenhum problema, não tenho do que reclamar</p>
														</div>
													</li>
												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="Seu Nome">
													<input class="input" type="email" placeholder="Seu Email">
													<textarea class="input" placeholder="Sua Análise"></textarea>
													<div class="input-rating">
														<span>Sua avaliação: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Enviar</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Produtos recomendados</h3>
						</div>
					</div>

					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/1650_Gigabyte.jpeg" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Low end</p>
								<h3 class="product-name"><a href="product.php">Gigabyte GeForce GTX 1650</a></h3>
								<h4 class="product-price">R$685.00 <del class="product-old-price">$890.00</del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar ao favoritos</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar ao comparador</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visão rápida</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i></button>
							</div>
						</div>
					</div>
					<!-- /product -->

					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/5700XT_XFX.jpeg" alt="">
								<div class="product-label">
									<span class="new">Lançamento</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">High End</p>
								<h3 class="product-name"><a href="product.php">XFX AMD RX 5700 XT</a></h3>
								<h4 class="product-price">$3980.00 <del class="product-old-price">$3990.00</del></h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar ao favoritos</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar ao comparador</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visão rápida</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> adicionar ao carrinho</button>
							</div>
						</div>
					</div>
					<!-- /product -->

					<div class="clearfix visible-sm visible-xs"></div>

					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/580_Asrock.jpeg" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Med End</p>
								<h3 class="product-name"><a href="product.php">Asrock AMD RX 580</a></h3>
								<h4 class="product-price">R$980.00 <del class="product-old-price">$1090.00</del></h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar ao favoritos</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar ao comparador</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visão rápida</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> adicionar ao carrinho</button>
							</div>
						</div>
					</div>
					<!-- /product -->

					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/2080TI_Gigabyte.jpeg" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">High END</p>
								<h3 class="product-name"><a href="product.php">Gigabyte NVIDIA RTX 2080TI</a></h3>
								<h4 class="product-price">$4990.00 <del class="product-old-price">$5090.00</del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar ao favoritos</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar ao comparador</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visão rápida</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> adicionar ao carrinho</button>
							</div>
						</div>
					</div>
					<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

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
