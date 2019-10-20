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
			<div class="second-part">
				<h3 class="text-center">Información de facturación</h3>
				<form>
					<div class="form-row pt-2">
						<div class="col form-row mx-2">
						 	<label class="form-text col col-sm-2" for="name">Nombre: </label>
							<input class="form-control col" name="name" type="text">
						</div>
						<div class="col form-row mx-2">
							<label class="form-text col col-sm-2" for="surname">Apellido: </label>
							<input class="form-control col" name="surname" type="text">
						</div>
				 	</div>

				 	<div class="form-row pt-2">
				 		<div class="col form-row mx-2">
						 	<label class="form-text col col-sm-2" for="company">Compañía: </label>
							<input class="form-control col" name="company" type="text">
						</div>
						<div class="col form-row mx-2">
							<label class="form-text col col-sm-2" for="email">Correo: </label>
							<input class="form-control col" name="email" type="email">
						</div>
				 	</div>

				 	<div class="form-row pt-2">
				 		<div class="col form-row mx-2">
						 	<label class="form-text col col-sm-2" for="country">País: </label>
							<input class="form-control col" name="country" type="text">
						</div>
						<div class="col form-row mx-2">
							<label class="form-text col col-sm-2" for="city">Ciudad: </label>
							<input class="form-control col" name="city" type="text">
						</div>
				 	</div>

				 	<div class="form-row pt-2">
				 		<div class="col form-row mx-2">
						 	<label class="form-text col col-sm-2" for="state">Estado: </label>
							<input class="form-control col" name="state" type="text">
						</div>
						<div class="col form-row mx-2">
							<label class="form-text col col-sm-2" for="postalCode">ZIP: </label>
							<input class="form-control col" name="postalCode" type="text" >
						</div>
				 	</div>

				 	<div class="form-row pt-2">
				 		<div class="col form-row mx-2">
						 	<label class="form-text col col-sm-2" for="phone">Teléfono: </label>
							<input class="form-control col" name="phone" type="text">
						</div>
						<div class="col form-row mx-2">
							<label class="form-text col col-sm-2" for="fax">Fax: </label>
							<input class="form-control col" name="fax" type="text">
						</div>
				 	</div>

				 	<button type="button" class="btn btn-register mt-3 py-2">Continuar</button>
				</form>
			</div>
			<div class="third-part row">
				<div class="col col-5 d-none d-sm-block img-section">
					<img class="w-75 mb-0 mt-5" src="{{ asset('/images/giftcard/banner.svg') }}">
				</div>
				<div class="col px-sm-5">
					<h3 class="text-center">Información de pago</h3>
					<div class="text-center">
						<p class="mt-5">Serás redirigido a PayPal para finalizar la compra</p>
						<button class="btn btn-paypal">
							<strong>Confirmar con </strong>
							<img src="{{ asset('/images/giftcard/PayPal.png') }}">
						</button>
					 	<button type="button" class="btn-login btn w-75 mt-5 py-2">Continuar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection