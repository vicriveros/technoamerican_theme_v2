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
            
            <?php if(have_posts()){
                while(have_posts()){ the_post();
            ?>
                    <h1><?php the_title(); ?></h1>
            <?php
                    the_content();
                }
            }?>
            
            </div>  
        </div>

    </div>
    </div>

<?php get_footer();?>