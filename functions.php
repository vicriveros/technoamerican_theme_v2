<?php 

function init_template(){
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag' );

    register_nav_menus(
        array(
          'top_menu' => 'Principal'
        )
    );
}
add_action('after_setup_theme','init_template');

function template_styles(){
    //css
    wp_enqueue_style( 'estilos', get_template_directory_uri()."/assets/css/estilos.css",  array(),'20200422' );
    wp_enqueue_style( 'web-tech', get_template_directory_uri()."/style.css",  array(),'20200422' );
    wp_enqueue_style( 'web-bootstrap', get_template_directory_uri()."/assets/css/bootstrap.min.css",  array(),'20200422' );
    wp_enqueue_style( 'web-animate', get_template_directory_uri()."/assets/css/animate.min.css",  array(),'20200422' );
    wp_enqueue_style( 'web-normalize', get_template_directory_uri()."/assets/css/normalize.min.css",  array(),'20200422' );
    
    //js
    wp_enqueue_script( 'wow', get_template_directory_uri()."/assets/js/wow.min.js", false,"1.1", true );
    wp_enqueue_script( 'jquery.mixitup', get_template_directory_uri()."/assets/js/jquery-3.2.1.min.js", false,"1.1", true );
    wp_enqueue_script( 'popper.min', get_template_directory_uri()."/assets/js/popper.min.js", false,"1.1", true );
    wp_enqueue_script( 'bootstrap.min', get_template_directory_uri()."/assets/js/bootstrap.min.js", false,"1.1", true );
    
}
add_action('wp_enqueue_scripts','template_styles');

class Custom_Walker_Nav_Menu_top extends Walker_Nav_Menu
{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $is_current_item = '';
        if(array_search('menu-item', $item->classes) != 0)
        {
            $is_current_item = ' class="nav-item"';
        }
        echo '<li'.$is_current_item.'><a class="nav-link" href="'.$item->url.'">'.$item->title;
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        echo '</a></li>';
    }
}

// API endpoint 
function prodAPI(){
    register_rest_route(
        'products/v1',
        '/list',
        array(
            'methods' => 'GET',
            'callback' => 'getProd'
        )
    );
  }
  add_action('rest_api_init', 'prodAPI');
  
  function getProd($data){
  global $wpdb;
  $prod_query = $wpdb->get_results("SELECT id, post_title, post_name FROM $wpdb->posts WHERE post_type='product' and post_status='publish' ORDER BY rand() LIMIT 6");
  foreach($prod_query as $prod) :
    $return[] = array(
      'id' => $prod->id,
      'title' => $prod->post_title,
      'name' => $prod->post_name,
      'img_src' => wp_get_attachment_image_src(get_post_thumbnail_id( $prod->id ), 'large'),
      'price' => get_post_meta($prod->id, '_price'),
    );
  endforeach;
  
  return $return;
  }