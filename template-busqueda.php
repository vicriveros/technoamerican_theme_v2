<?php 
    //Template Name: Busqueda
    get_header();
?>
<!-- ########   PRODUCTOS   ######## -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 mt-3 wow animate__animated  animate__bounceInLeft"><!-- col 3 --> 
            <!-- ============= COMPONENT ============== -->
            <nav class="sidebar card py-2 mb-4">
                <?php 
                $cat_args = array(
                    'orderby'    => 'name',
                    'order'      => 'asc',
                    'hide_empty' => false,
                );

                $product_categories = get_terms( 'product_cat', $cat_args );

                if( !empty($product_categories) ){
                    echo '<ul class="nav flex-column">';
                    foreach ($product_categories as $key => $category) {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="'.get_term_link($category).'" > '.$category->name.' </a>
                        </li>';
                    }
                    echo '</ul> ';
                }
                ?>

            </nav>
            <!-- ============= COMPONENT END// ============== -->   
        </div><!-- col /3 -->     


        <div class="col-sm-12 col-md-9  mt-3"><!-- col 9 -->
            <div class="row">
            
            <?php if(have_posts()){
                while(have_posts()){ the_post();
            ?>
                <h1>Productos que coinciden con: <?php echo $_GET['b']; ?></h1>
                <div class="row mt-5 animate__animated  animate__bounceInUp">  
            <?php
                    global $wpdb;
                    $sql="SELECT id, post_title, post_name FROM ".$wpdb->posts." WHERE post_type='product' AND post_status='publish' AND post_title LIKE '%".$_GET['b']."%' ORDER BY post_title ASC";
                    $busq_query = $wpdb->get_results($sql);
                    foreach($busq_query as $prod) : 
                        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $prod->id ), 'large');
                        $price = get_post_meta($prod->id, '_price');
                    ?>

                <!--   THUMB PRODUCTO   -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
						<div class="el-wrapper">
						<div class="box-up">
							<img class="img img-fluid" src="<?php echo $img_src[0]; ?>" alt="">
							<div class="img-info">
							<div class="info-thumb">
								<div class="p-titulo"><span class="bg-blanco"><?php echo $prod->post_title; ?></span></div>
								<div class="p-precio"><span class="bg-blanco">Gs.<?php echo number_format($price[0], 0, ',', '.')  ; ?></span></div>
							</div>
							<div class="p-marca">   </div>
							</div>
						</div>

						<div class="box-down">
							<div class="h-bg">
							<div class="h-bg-inner"></div>
							</div>

							<a class="ver-detalles" href="https://technoamerican.com.py/web/<?php echo $prod->post_name; ?>">
							<span class="icono"><i class="fas fa-search-plus"></i></span>
							<span class="ver">
								<span class="txt">Ver Producto</span>
							</span>
							</a>
						</div>
						</div>
				</div>
				<!--   /THUMB PRODUCTO   --> 

            <?php  endforeach;
                }
            }?>
            
            </div>  <!--   contenedor PRODUCTO   --> 
            </div>  
        </div>

    </div>
    </div>

<?php get_footer();?>