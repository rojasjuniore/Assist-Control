<!DOCTYPE html>
<html lang="es">
<head>

    @include('front.includes.head')

</head>
<body>
   
{{--Menu de Front--}}
@include('front.includes.menu-front')
      
    
{{--Banner Top Home--}}
@include('front.parts-front.banner-top-home')

{{--Registro Home--}}
@include('front.parts-front.registro-home')

     
{{--Pasos Home--}}
@include('front.parts-front.pasos-home')
    
{{--Como funciona Home--}}
@include('front.parts-front.como-funciona-home')
    
{{--Servicios Home--}}
@include('front.parts-front.servicios-home')


{{--Contactenos Home--}}
@include('front.parts-front.contactenos-home')

    
{{--Footer Top--}}
@include('front.includes.footer-top')

{{--Footer Top--}}
@include('front.includes.bottom-footer')   

</body>
</html>