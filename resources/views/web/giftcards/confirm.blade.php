@extends('web.giftcards.layout')

@section('content')
	<div class="container confirm-page my-4 px-5">
		<div class="title my-4">
			<div class="text-center fa-3x">
				<span class="fa-layers fa-fw">
					<i class="fas fa-circle circle-completed"></i>
				    <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i>
			  	</span>
			  	<span class="fa-layers fa-fw">
					<i class="fas fa-circle circle-active"></i>
				    <i class="fa-inverse fas fa-file-alt" data-fa-transform="shrink-6"></i>
			  	</span>
			  	<span class="fa-layers fa-fw">
					<i class="fas fa-circle circle-blocked"></i>
				    <i class="fa-inverse fas fa-coins" data-fa-transform="shrink-6"></i>
			  	</span>
			  	<span class="fa-layers fa-fw">
					<i class="fas fa-circle circle-blocked"></i>
				    <i class="fa-inverse fas fa-gift" data-fa-transform="shrink-6"></i>
			  	</span>
			</div>
		</div>
		<div class="py-5 px-5 form-content">
			<div class="first-part row">
				<div class="col col-5 d-none d-sm-block img-section">
					<img class="w-75 mb-0 mt-5" src="{{ asset('/images/giftcard/banner.svg') }}">
				</div>
				<div class="col px-sm-5">
					<h3 class="text-center">¿Eres invitado o estás registrado?</h3>
					<p>Regístrate para más beneficios como:</p>
					<ul>
						<li>
							<i class="fa fa-xs fa-check"></i>
							Compra fácil y rápida.
						</li>
						<li>
							<i class="fa fa-xs fa-check"></i>
							Acceso fácil al historial de pedidos y estatus.
						</li>
					</ul>
					<div class="text-center">
						<a href="{{ route('login') }}" class="btn-login btn w-75 mt-3 py-2">
							Ingresar
						</a>
						<a href="{{ route('register') }}" class="btn-login btn w-75 mt-3 py-2">
							Regístrate
						</a>
						<a href="#/" class="btn-login btn w-75 mt-3 py-2">
							Continuar como invitado
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection