<!DOCTYPE html>
<html>
<head>
	<title>Tienda Gift-Card</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/web/giftcard.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/web/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/web/font-awesome.min.css') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light px-4">
		<a class="navbar-brand" href="#"><img src="{{ asset('images/giftcard/logo.png') }}"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-center" href="{{ route('web.index') }}">Inicio</a>
				</li>
				@guest
					<li class="nav-item">
						<a class="nav-link text-center" href="{{ route('login') }}">Inicia sesión</a>
					</li>
				@endguest
				@auth
					<li class="nav-item">
						<a class="nav-link text-center" href="{{ route('home') }}">Mi cuenta</a>
					</li>
				@endauth
			</ul>
		</div>
	</nav>

	@yield('content')

	<script src="{{ asset('/js/web/jquery-3.2.1.slim.min.js') }}"></script>
	<script src="{{ asset('/js/web/popper.min.js') }}"></script>
	<script src="{{ asset('/js/web/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/web/font-awesome.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>
	<script>
	    new Vue({
	        el: '#buy',
	        data: {
	            selected: null,
	            amount: null
	        },
	        computed: {
	        	total: function () {
	        		console.log(1)
		        	return (this.amount * 1.05).toFixed(2)
		        }
	        }
	    })
	</script>
</body>
</html>