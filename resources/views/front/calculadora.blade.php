<!DOCTYPE html>
<html lang="es">
<head>

    @include('front.includes.head')

</head>
<body>
   
{{--Menu de Front--}}
@include('front.includes.menu-front')
      
 
{{--Bloque calculadora--}}
@include('front.parts-front.calculadora-bloque')

{{--Contactenos Home--}}
@include('front.parts-front.contacto-tarifas')
    
{{--Footer Top--}}
@include('front.includes.footer-top')

{{--Footer Top--}}
@include('front.includes.bottom-footer')

</body>
</html>