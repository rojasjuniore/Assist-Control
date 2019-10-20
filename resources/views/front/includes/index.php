
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
    <!-- Theme tittle -->
    <title>Bienvenidos  a Casillero Express</title> 
    <!-- Theme style CSS -->       
	<link rel="stylesheet" href="http://casilleroexpressusa.com/nweb/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://casilleroexpressusa.com/nweb/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://casilleroexpressusa.com/nweb/css/style.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

</head>
<body>
   

<!-- Header Area -->
    <header class="main_header_area">   
        <div class="searchForm">
            <form action="#" class="row">
                <div class="input-group">
                    <span class="input-group-addon"><i class="flaticon-search"></i></span>
                    <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                    <span class="input-group-addon form_hide"><i class="flaticon-close"></i></span>
                </div>
            </form>
        </div>
        <nav class="navbar navbar-expand-lg"> 
            <a class="navbar-brand" href="http://casilleroexpressusa.com/nweb/home"><img src="http://casilleroexpressusa.com/nweb/images/logo-casillero-express.png" alt="Logo Casillero Express USA"></a> 
            <!-- Small Divice Menu-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar_supported"  aria-label="Toggle navigation"> 
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <!-- Right Nav bar -->
            <!-- Right Nav bar -->
            <ul class="right_nav">
                
                <li><a href="#" class="theme_btn"><i class="fas fa-user-plus"></i> Registrate</a></li>
            </ul> 
            <!-- Left Nav bar -->
            <div class="collapse navbar-collapse navbar_supported">
                <ul class="navbar-nav"> 
                    <li>
                        <a class="nav-link dropdown-toggle active" href="http://casilleroexpressusa.com/nweb/home" role="button" data-toggle="dropdown">Inicio</a>
                    </li>
                    <li>
                        <a href="http://casilleroexpressusa.com/nweb/somos">Acerca de</a></li>        
                    <li>
                        <a href="http://casilleroexpressusa.com/nweb/surcusales">Sucursales</a>
                    </li> 
                    <li><a href="http://casilleroexpressusa.com/nweb/contacto">Contactenos</a></li>  
                </ul>   
            </div>
        </nav>   
    </header>
    <!-- Header Area -->
      
 

<!-- Pages Banner Area -->   
    <section class="pages_banner" id="parallax">   
       <img src="images/bannar-shap-1.png" alt="" class="layer layer_1" data-depth="0.10">
       <img src="images/bannar-shap-2.png" alt="" class="layer layer_2" data-depth="0.35">
        <div class="container">
            <img src="images/pages-banner-4.png" alt="" class="bannar_img wow fadeInRight">
            <h2 class="wow fadeInUp">Contactenos <br>Todo el tiempo</h2> 
            <p class="wow fadeInUp" data-wow-delay="0.3s">Nuestro equipo esta presto a su consulta, sugerencia o reclamo. Estamos para servile en todo.</p> 
           <img src="images/p-banner-shap.png" alt="" class="layer_3">
        </div> 
    </section>
    <!-- End Pages Banner Area -->  
    
    <!-- Get In Touch With Us Area --> 
    <section class="get_touch_area">
        <div class="container">
            <h4>Te ofrecemos nuestro servicio de asesoría gratuita en caso de que quieras profundizar o utilizar alguno de nuestros servicios. A través de correo electrónico te contactáremos y te explicaremos de manera personalizada cómo te podemos ayudar para que realices tus compras internacionales sin problema.</h4><br>
            <div class="row">
                <div class="col-lg-6 map_area">
                    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=3509%20NW%20115th%20Ave%2C%20Doral%2C%20FL%2033178%2C%20EE.%20UU.&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
                <div class="col-lg-6"> 
                    <form class="from_main" action="php/contact.php" method="post" id="phpcontactform" novalidate="novalidate"> 
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Hombre completo">
                        </div>  
                        <div class="row"> 
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control col-md-6" id="email" name="email" placeholder="Email"> 
                            </div>
                            <div class="form-group col-lg-6">   
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Telefono"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message" name="message" placeholder="Su mensaje"></textarea>
                        </div>
                        <div class="form-group m-0">
                            <button class="theme_btn btn" id="js-contact-btn" type="submit">Enviar</button> 
                            <div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Mesaje enviado"></div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </section>
    <!-- Get In Touch With Us Area --> 
    
;

    

<!-- Footer Area -->  
    <footer class="footer_area"> 
        <img src="images/footer-shap.png" alt="" class="shap">
        <div class="round_shap"></div>
        <div class="footer_inner row">   
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 footer_logo wow fadeIn">
                <a href="http://casilleroexpressusa.com/nweb/home"><img src="http://casilleroexpressusa.com/nweb/images/logo-casillero-express.png" alt=""></a> 
                
                <ul class="footer_menu"> 
                    <li><a href="#">CARRERA</a></li>
                    <li><a href="contact.html">CONTACTO</a></li>
                    <li><a href="http://casilleroexpressusa.com/nweb/politicas-privacidad">PRIVACIDAD</a></li>
                </ul>
                <ul class="footer_social"> 
                    <li><a href="https://www.facebook.com/casilleroexpres?fref=ts"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://www.instagram.com/casilleroexpress/"><i class="fa fa-instagram"></i></a></li> 
                </ul>
            </div>
            <div class="footer_widget fw_1 col-xl-2 col-lg-3 col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                <h4>Mi Cuenta</h4>
                <ul class="footer_nav"> 
                    <li><a href="#">Mi Cuenta</a></li>
                    <li><a href="#">Mis pedidos</a></li> 
                    <li><a href="#">Mis pagos</a></li> 
                    <li><a href="#">Mis env&iacute;os</a></li>
                </ul>
            </div>  
            <div class="footer_widget fw_2 col-xl-2 col-lg-3 col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                <h4>Direcci&oacute;n Miami</h4>
                <address>
                   3509 nw 115 Ave, <br>Doral FL 33178 USA
                    <a href="#" class="email">info@casilleroexpressusa.com</a>
                    <a href="#" class="phone"> +1(305)934-9442</a>
                </address>
            </div>   
            <div class="footer_widget fw_4 col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.8s">
                <h4>Informaci&oacute;n</h4>
                <ul class="footer_nav">  
                    <li><a href="http://casilleroexpressusa.com/nweb/politicas-privacidad">Políticas de privacidad</a></li>
                    <li><a href="http://casilleroexpressusa.com/nweb/faq">Preguntas y repuestas</a></li>
                    <li><a href="http://casilleroexpressusa.com/nweb/somos">Quienes somos</a></li>
                    <li><a href="#">Otro</a></li>
                </ul>
            </div>
            <div class="footer_widget fw_3 col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.6s">
                <h4>Proveedores</h4>
                
                <img src="http://casilleroexpressusa.com/nweb/images/AMAZON.png" alt="Logo Amazon"><br>
                <img src="http://casilleroexpressusa.com/nweb/images/WALMART.png" alt="Logo Walmart">
                <br><br>
                <img src="http://casilleroexpressusa.com/nweb/images/Logo_CCCE.png" alt="Logo Camara Colombiana de Comercio">
            </div>  
        </div> 
        <div class="container btn_container">
            <a href="#" class="theme_btn apple"><i class="fab fa-apple"></i>App Store</a>
            <a href="#" class="theme_btn"><i class="fab fa-google-play"></i>Play Store</a> 
        </div>
        <p class="copy_right">© 2019 Todo los Derechos Reservados</p>
    </footer>
    <!-- End Footer Area --> ;


<!-- Scroll Top Button -->
    <button class="scroll-top">
        <i class="fa fa-angle-double-up"></i>
    </button>
    
    <!-- Preloader -->  

    
    <script src="js/theme.js"></script> 
<!-- jQuery v3.3.1 -->
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/js/jquery-3.3.1.min.js" async></script>
    <!-- Bootstrap v4.0.0 -->
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/js/popper.min.js" async></script>
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/js/bootstrap.min.js" async></script>
    <!-- Extra Plugin -->
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/vendors/animate-css/wow.min.js" async></script>
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/vendors/parallaxmouse/parallax.min.js" async></script>
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/vendors/counterup/jquery.waypoints.min.js" async></script>
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/vendors/counterup/jquery.counterup.min.js" async></script>
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/vendors/parallaxmouse/jquery.jqlouds.min.js" async></script>
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/vendors/magnify-popup/jquery.magnific-popup.min.js" async></script>
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/vendors/isotope/imagesloaded.pkgd.min.js" async></script>
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/vendors/bootstrap-selector/jquery.nice-select.min.js" async></script>
<!-- Theme js / Custom js -->
<script type="text/javascript" src="http://casilleroexpressusa.com/nweb/js/theme.js" async></script>
;    

</body>
</html>