<?php get_header();?>



<!-- ########   PRODUCTOS   ######## -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 mt-3 wow animate__animated  animate__bounceInLeft"><!-- col 3 --> 
			<!-- ============= COMPONENT ============== -->
			<nav class="sidebar card py-2 mb-4">
				<?php 
				$cat_args = array(
					'orderby'    => "menu_order",
					'hide_empty' => false,
					'parent' => 0
				);

				$product_categories = get_terms( 'product_cat', $cat_args );

				if( !empty($product_categories) ){
					echo '<ul class="nav flex-column">';
					foreach ($product_categories as $key => $category) {
						$subcat_args = array(
							'orderby'    => "menu_order",
							'hide_empty' => false,
							'child_of' => $category->term_id,
						);
						$sub_categories = get_terms( 'product_cat', $subcat_args );

						echo '
						<li class="nav-item dropdown">
							<a class="nav-link" href="'.get_term_link($category).'" > '.$category->name.' </a>';
						
						if( !empty($sub_categories) ){
							echo' <div class="dropdown-content">';
								foreach ($sub_categories as $key => $subcategory) {	
									echo '<a class="nav-link" href="'.get_term_link($subcategory).'" > '.$subcategory->name.' </a>';
								}
							echo '</div>';
						}

						echo '</li>';

					} //endforeach
					echo '</ul> ';
				}
				?>

			</nav>
			<!-- ============= COMPONENT END// ============== -->   
        </div><!-- col /3 -->     


        <div class="col-sm-12 col-md-9  mt-3"><!-- col 9 -->
			<div class="row">
				<!-- ########   BANNER   ######## -->
				<div class="wow animate__animated  animate__bounceInUp">
					<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/banner.jpg" class="d-block w-100" alt="Cartuchos Ekoprint">
							</div>
							<div class="carousel-item">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/banner3.jpg" class="d-block w-100" alt="Imprimi mucho mas con ekoprint">
							</div>
							<div class="carousel-item">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/banner2.jpg" class="d-block w-100" alt="ekoprint pensando en verde antes de imprimir">
							</div>

						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
				<!-- ########   /BANNER   ######## -->
			</div>  

			<div class="row justify-content-center mt-5 animate__animated  animate__bounceInUp">  
				<?php
					$data = file_get_contents('https://technoamerican.com.py/web/wp-json/products/v1/list/');
					$json = json_decode($data, true);
					foreach ($json as $key => $value) {
				?>

				<!--   THUMB PRODUCTO   -->
				<div class="col-lg-4 col-md-6 col-sm-6 mb-4">
						<div class="el-wrapper">
						<div class="box-up">
							<img class="img img-fluid" src="<?php echo $json[$key]['img_src'][0]; ?>" alt="">
							<div class="img-info">
							<div class="info-thumb">
								<div class="p-titulo"><span class="bg-blanco"><?php echo $json[$key]['title']; ?></span></div>
								<div class="p-precio"><span class="bg-blanco">Gs.<?php echo number_format($json[$key]['price'][0], 0, ',', '.') ; ?></span></div>
							</div>
							<div class="p-marca">   </div>
							</div>
						</div>

						<div class="box-down">
							<div class="h-bg">
							<div class="h-bg-inner"></div>
							</div>

							<a class="ver-detalles" href="https://technoamerican.com.py/web/<?php echo $json[$key]['name']; ?>">
							<span class="icono"><i class="fas fa-search-plus"></i></span>
							<span class="ver">
								<span class="txt">Ver Producto</span>
							</span>
							</a>
						</div>
						</div>
				</div>
				<!--   /THUMB PRODUCTO   -->            
				<?php } ?>
			</div>  <!-- col /row -->


			<div class="row mt-5">
				<div class="col-md-4  wow animate__animated  animate__bounceInUp"><img class="img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/icono-soporte.jpg" alt="Soporte tecnico"></div>
				<div class="col-md-4 wow animate__animated  animate__bounceInDown"><img class="img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/icono-garantia.jpg" alt="Garantia"></div>
				<div class="col-md-4 wow animate__animated  animate__bounceInRight"><img class="img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/icono-delivery.jpg" alt="Delivery"></div>
			</div>

        </div><!-- col /9 -->
   
    </div>
</div>

<?php get_footer();?>