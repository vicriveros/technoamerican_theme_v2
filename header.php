<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Techno American S.R.L - Venta de Cartuchos, Cintas y Toners Compatibles Ekoprint.">
	<meta name="keywords" content="toner, cartucho, cinta, ekoprint, compatibles, paraguay">
    <?php wp_head(); ?>
    <link rel="icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon-techno.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>Techno American S.R.L.</title>


    <script>
     new WOW().init();
    </script>


<script type="text/javascript">
    window.addEventListener("resize", function() {
        "use strict"; window.location.reload(); 
    });

    document.addEventListener("DOMContentLoaded", function(){
         // make it as accordion for smaller screens
        if (window.innerWidth < 992) {

            document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
                
                element.addEventListener('click', function (e) {

                    let nextEl = element.nextElementSibling;
                    let parentEl  = element.parentElement;
                    let allSubmenus_array = parentEl.querySelectorAll('.submenu');

                    if(nextEl && nextEl.classList.contains('submenu')) {    
                        e.preventDefault(); 
                        if(nextEl.style.display == 'block'){
                            nextEl.style.display = 'none';

                        } else {
                            nextEl.style.display = 'block';
                        }

                    }
                });
            })
        }
        // end if innerWidth

    }); 
    // DOMContentLoaded  end
</script>
</head>

<body>
<!--  WHATSAPP  -->

<a class="wow bounceInDown btn-whatsapp" href="https://wa.me/595972444535" data-wow-delay="1.4s"> 
  <i style="font-size: 35px; margin-top: 12px;" class="fab fa-whatsapp"></i>
</a>

<!-- /WHATSAPP  --> 
    <header>
    <div class="top-bar ">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-4">
                     <ul class="social-share ">
                        <li><a href="https://www.facebook.com/technoamerican" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/technoamericansrl/" target="_blank"><i class="fab fa-instagram"></i></a></li> 
                        <li><a href="mailto:info@technoamerican.com.py" target="_blank"><i class="fas fa-envelope"></i> </a></li>                                
                    </ul>
                </div>
                <div class="col-md-9 col-lg-8  blanco text-end">
                  Tel:+595 21 444 535 / +595 21 490 449 
                </div>
            </div>
        </div>
    </div> 

    <div class="container ">
            <div class="row">
                <div class="col-md-5 col-lg-4">
                  <a href="https://technoamerican.com.py/web/">
                    <img class="img-fluid mt-4 wow bounceIn" src="<?php echo get_template_directory_uri();?>/assets/img/logo-technoamerican.png" alt="technoamerican logo">
                    </a>
                </div>
                        <div class="col-md-5 col-lg-6 ">
                    <div class="search mt-5 ml-5">
                        <form method="get" action="https://technoamerican.com.py/web/busqueda">
                            <input name="b" type="text" class="searchTerm" placeholder="Buscar producto...">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                        </div>
                <div class="col-md-2 col-lg-2 text-right mt-5"><a class="btn carrito" href="https://technoamerican.com.py/web/carrito/"><i class="fas fa-shopping-cart"></i> Ver Carrito</a>
                </div>
            </div>
    </div>
    <div class="container ">
        <div class="row mt-3">
            <div class="menu_area">

            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="collapse navbar-collapse" id="ca-navbar">
                    <ul class="navbar-nav mx-auto">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'top_menu',
                                'walker' => new Custom_Walker_Nav_Menu_Top
                                )
                            );
                        ?>
                    </ul>
                </div>
            </nav>

            </div>  
        </div> 
    </div>

    </header>