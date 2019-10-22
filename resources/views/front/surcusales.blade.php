<!DOCTYPE html>
<html lang="es">
<head>

    @include('front.includes.head')

</head>
<body>
   
{{--Menu de Front--}}
@include('front.includes.menu-front')
      
 
{{--Surcusales Contenido--}}
@include('front.parts-front.surcusales-front')

{{--Contactenos Home--}}
@include('front.parts-front.contactenos-home')

    
{{--Footer Top--}}
@include('front.includes.footer-top')

{{--Footer Top--}}
@include('front.includes.bottom-footer')  

</body>
</html>