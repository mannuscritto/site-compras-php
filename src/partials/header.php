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
                <?php require_once "auth-buttons.php" ?>
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
								<a href="index.php" class="Logo_Petshop_gabelof-removebg-preview">
									<img src="./img/Logo_Petshop_gamelof.png" alt="Logo_Petshop_gabelof-" class="img-logo-tamanho">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="search.html">
                            <select class="input-select" name="cat">
                                <option value="0">Tudo</option>
                                <option value="1">Low End</option>
                                <option value="2">Mid End</option>
                                <option value="3">High End</option>
                            </select>
                            <input class="input" placeholder="Pesquise por modelos, fabricantes..." name="q">
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