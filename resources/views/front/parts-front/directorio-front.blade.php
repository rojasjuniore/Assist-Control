{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style type="text/css">
    


.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #27cbd3;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #27cbd3;
    border-radius: 5px;
    text-align: center;
    color: #27cbd3;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #27cbd3;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #27cbd3;

}
.btn-default:active .filter-button:active
{
    background-color: #27cbd3;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}

</style>

<script type="text/javascript">
    
    $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>

    <!-- Pages Banner Area -->   

    <section class="pages_banner" id="parallax">   

       <img src="{{ asset('front/images/bannar-shap-1.png') }}" alt="" class="layer layer_1" data-depth="0.10">

       <img src="{{ asset('front/images/bannar-shap-2.png') }}" alt="" class="layer layer_2" data-depth="0.35">

        <div class="container">

            <img src="{{ asset('front/images/casillero-express-directorio-de-tiendas.jpg') }}" alt="Tienda en Casillero Express" class="bannar_img wow fadeInRight">

            <h2 class="wow fadeInUp">Listado de tienda para compras</h2>

{{--             <p class="wow fadeInUp" data-wow-delay="0.3s">Texto. </p>  --}}

            <p><a href="#registrohome" class="theme_btn">Registrate</a></p>

           <img src="images/p-banner-shap.png" alt="" class="layer_3">

        </div> 

    </section>

    <!-- End Pages Banner Area --> 

    <!-- Our Work Area --> 

    <section class="our_works_area">
        <div class="container">
            <div class="row">
                <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                    <button class="btn btn-default filter-button" data-filter="all">Todo</button>
                    <button class="btn btn-default filter-button" data-filter="eu">Europa</button>
                    <button class="btn btn-default filter-button" data-filter="us">USA</button>
                </div>
                <br>
                <br/>
                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.amazon.com/" title="Amazon">
                        <img src="{{ asset('front/images/tiendas/usa/amazon.jpg') }}" class="img-responsive" alt="Puedes encontrar de todo, ropa, tecnología, accesorios y alimentos">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.ebay.com/" title="Ebay">
                        <img src="{{ asset('front/images/tiendas/usa/ebay.jpg') }}" class="img-responsive" alt="Puedes encuentras de todo; artículos electrónicos, moda, artículos deportivos, tecnología y artículos para bebés.">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.aki.es/aki">
                        <img src="{{ asset('front/images/tiendas/eur/aki.jpg') }}" class="img-responsive" alt="Artículos para el hogar, jardinería y exteriores ">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.bebitus.com" title="Bebitus">
                        <img src="{{ asset('front/images/tiendas/eur/bebitus.jpg') }}" class="img-responsive" alt="Toda clase de artículos para bebés">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.walmart.com/" title="Walmart">
                        <img src="{{ asset('front/images/tiendas/usa/walmart.jpg') }}" class="img-responsive" alt="Artículos electrónicos, hogar, muebles, video juegos, bebés, ropa, juguetes y hasta hacer mercado.">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.target.com/" title="Target">
                        <img src="{{ asset('front/images/tiendas/usa/target.jpg') }}" class="img-responsive" alt="Tienda de ahorros en artículos de electrónica, hogar, muebles, videojuegos, bebé, ropa y juguetes">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://zootsports.com/" title="Zoot Sports">
                        <img src="{{ asset('front/images/tiendas/eur/zoot.jpg') }}" class="img-responsive" alt="Ropa deportiva para deportes de resistencia">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.birchbox.es/" title="Birchbox">
                        <img src="{{ asset('front/images/tiendas/eur/birchbox.jpg') }}" class="img-responsive" alt="Artículos de belleza, cuidado facial, maquillaje y fragancias">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.gamestop.com/" title="Game Stop">
                        <img src="{{ asset('front/images/tiendas/usa/gamestop.jpg') }}" class="img-responsive" alt="Podrás encontrarás diferentes tipos de juegos y DVDs de juegos y accesorios para jugar">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.macys.com/" title="Macy’s ">
                        <img src="{{ asset('front/images/tiendas/usa/macys.jpg') }}" class="img-responsive" alt="Sus productos incluyen prendas de vestir como ropa, accesorios, zapatos y joyas">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://timeroad.es/" title="Time Road">
                        <img src="{{ asset('front/images/tiendas/eur/time-road.jpg') }}" class="img-responsive" alt="Artículos de relojería y joyas para hombre y mujer">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.laredoute.es/" title="Laredoute">
                        <img src="{{ asset('front/images/tiendas/eur/laredoute.jpg') }}" class="img-responsive" alt="Artículos de moda, calzado y elementos para el hogar">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.shopdisney.com/" title="Disney Store">
                        <img src="{{ asset('front/images/tiendas/usa/disney-shop.jpg') }}" class="img-responsive" alt="Productos y colecciones del maravilloso mundo de Disney. ">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.apple.com/" title="Apple">
                        <img src="{{ asset('front/images/tiendas/usa/apple.jpg') }}" class="img-responsive" alt="Podrás encontrar lo último de la marca, iPhone, tabletas iPad, computadores Mac, hasta televisores, relojes Apple y accesorios">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.pccomponentes.com" title="PC Componentes">
                        <img src="{{ asset('front/images/tiendas/eur/pccomponentes.jpg') }}" class="img-responsive" alt="Artículos tecnológicos y electrónicos para pc, Smartphone, tabletas, tv y demás">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="http://www.phonenatic.com/" title="Phonenatic">
                        <img src="{{ asset('front/images/tiendas/eur/phonenatic.jpg') }}" class="img-responsive" alt="Artículos y accesorios para smartphone y tabletas. ">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.etsy.com/" title="Etzy">
                        <img src="{{ asset('front/images/tiendas/usa/etsy.jpg') }}" class="img-responsive" alt="Los productos incluyen arte y proyectos de bricolaje, productos antiguos, joyas, fotografía y productos únicos hechos a mano">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.staples.com/" title="Staples">
                        <img src="{{ asset('front/images/tiendas/usa/staple.jpg') }}" class="img-responsive" alt="Artículos y elementos necesarios para las empresas, oficinas y compañías">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.ikea.com/es/es/" title="IKEA">
                        <img src="{{ asset('front/images/tiendas/eur/IKEA.jpg') }}" class="img-responsive" alt="Artículos para decoración de hogar e interiores">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.beep.es/" title="Beep">
                        <img src="{{ asset('front/images/tiendas/eur/beep.jpg') }}" class="img-responsive" alt="Toda clase de artículos tecnológicos y electrónicos ">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.homedepot.com/" title="The Home Depot">
                        <img src="{{ asset('front/images/tiendas/usa/Home-Depot-Logo.jpg') }}" class="img-responsive" alt="Artículos de hogar, ferretería, bricolaje y materiales de construcción">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.bestbuy.com/" title="Best Buy">
                        <img src="{{ asset('front/images/tiendas/usa/best-buy.jpg') }}" class="img-responsive" alt="Artículos electrónicos ">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="http://radzentrum-nagold.shop/" title="Radzentrum">
                        <img src="{{ asset('front/images/tiendas/eur/rz_logo.jpg') }}" class="img-responsive" alt="Bicicletas eléctricas, clásicas y todo tipo de accesorios">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.pixmania.es/" title="Pixmania">
                        <img src="{{ asset('front/images/tiendas/eur/pixmania.jpg') }}" class="img-responsive" alt="Artículos tecnológicos, electrónicos, telefonía, fotografía e informática">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.overstock.com/" title="Overstock">
                        <img src="{{ asset('front/images/tiendas/usa/overstock.jpg') }}" class="img-responsive" alt="Tienda de muebles y decoración para el hogar">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://shop.nordstrom.com/" title="Nordstrom">
                        <img src="{{ asset('front/images/tiendas/usa/nordstrom.jpg') }}" class="img-responsive" alt="https://shop.nordstrom.com/">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.elcorteingles.es/" title="El Corte Inglés">
                        <img src="{{ asset('front/images/tiendas/eur/el-corte-ingles.jpg') }}" class="img-responsive" alt="Puedes encontrar de todo, ropa, tecnología, accesorios, videojuegos, libros y alimentos">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter eu">
                    <a href="https://www.lightinthebox.com" title="Light in the box ">
                        <img src="{{ asset('front/images/tiendas/eur/lightinthebox.jpg') }}" class="img-responsive" alt="Puedes encontrar de todo, ropa, tecnología, accesorios y alimentos">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.costco.com/" title="Costco">
                        <img src="{{ asset('front/images/tiendas/usa/costco.jpg') }}" class="img-responsive" alt="Artículos electrónicos, hogar, muebles, video juegos, bebés, ropa, juguetes y hasta hacer mercado">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.lb.com/" title="L Brands">
                        <img src="{{ asset('front/images/tiendas/usa/l-brands.jpg') }}" class="img-responsive" alt="Artículos de moda estadounidense">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="https://www.dreivip.com/" title="Dreivyp">
                        <img src="{{ asset('front/images/tiendas/eur/dreivyp.jpg') }}" class="img-responsive" alt="Artículos de moda, Deporte, Cuidado personal, Complementos, Electrónica, Informática, Joyería, Relojería y Hogar">
                    </a>
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter us">
                    <a href="http://venta.vente-privee.com/" title="Vente-privee">
                        <img src="{{ asset('front/images/tiendas/eur/vente-privee.jpg') }}" class="img-responsive" alt="Artículos de moda, juguetes, artículos deportivos, relojes, equipamiento para el hogar y alta tecnología">
                    </a>
                </div>
            </div>
        </div>
    </section> 

    <!-- End Our Work Area --> 