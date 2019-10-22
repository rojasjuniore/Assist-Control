
<!DOCTYPE html>
<html lang="es">
<head>

    @include('front.includes.head')

</head>
<body>
   
{{--Menu de Front--}}
@include('front.includes.menu-front')
      
 
{{--Somos Contenido--}}
@include('front.parts-front.servicios-front')

{{--Registro Home--}}
@include('front.parts-front.registro-home')

    
{{--Footer Top--}}
@include('front.includes.footer-top')

{{--Footer Top--}}
@include('front.includes.bottom-footer')  

</body>
</html>