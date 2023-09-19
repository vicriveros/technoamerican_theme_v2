<?php get_header();?>
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
            
                <h1><?php the_title(); ?></h1>

                    <?php if(have_posts()){
                            while(have_posts()){ the_post();
                                $taxonomy = get_the_terms( get_the_ID(), 'categoria-productos');
                    ?>

                    <div class="row my-5">
                        <div class="col-md-6 col-12">
                            <?php the_post_thumbnail('large')?>
                        </div>
                        <div class="col-md-6 col-12">
                            <?php echo do_shortcode('[contact-form-7 id="56" title="Contact Form"]');?>
                        </div>
                        <div class="col-12">
                            <?php the_content();?>
                        </div>
                    </div>
                    <?php 
                        $args = array(
                            'post_type' => 'producto',
                            'post_per_page' => 6,
                            'order' => 'ASC',
                            'orderby' => 'title',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'categoria-productos',
                                    'field' => 'slug',
                                    'terms' => $taxonomy[0] -> slug
                                )
                            )
                        );
                        $productos = new WP_Query($args);

                        if($productos -> have_posts()){ ?>
                            <div class="row text-center justify-content-center productos-relacionados">
                            <div class="col-12">
                                <h3>Productos Relacionados</h3>
                            </div>
                            
                                <?php while($productos -> have_posts()){
                                    $productos -> the_post(); ?>
                                    <div class="col-2 my-3 text-center">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                        <h4>
                                            <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
                                        </h4>
                                    </div>
                                <?php } ?>
                            </div>
                    <?php    }
                    }
                        } ?>
            
            </div>  
        </div>

    </div>

<?php get_footer();?>

