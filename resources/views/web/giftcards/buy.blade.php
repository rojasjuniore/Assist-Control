@extends('web.layout')

@section('content')
<style>
	.combo-selected{
		border:2px solid #337AB7;
		box-shadow: 0px 0px 3px black;
	}
</style>
	@if (session('error'))
	    <div class="alert alert-danger alert-dismissible fade show" role="alert">
	        <strong>{{ session('error') }}</strong>
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	        </button>
	    </div>
	@endif
	<div class="container shop-page my-4" style="background: rgba(255,255,255,.83);border-radius: 10px; padding: 20px;">
		<div class="row">
			<div class="col col-12 col-sm-4 offset-sm-1 card-section">
				<img class="w-100 my-5 img-responsive" src="{{ asset('158624558/images/slide-img3.png') }}">
				<p class=" text-center description">Puedes comprar una gift card en nuestra plataforma y regalarla a un amigo o familiar en Venezuela</p>
			</div>
			<div class="col col-12 col-sm-6 form-section px-5">
				<div class="title my-4">
					<p class="text-center title-form">Completa el formulario para realizar la compra</p>
				</div>
				<form action="{{ route('giftcards.store') }}" method="post" id="buy">
					{{ csrf_field() }}
					{{ method_field('POST') }}
					
					{{-- COMBOS --}}
					<a href="" v-on:click.prevent="setCombo()" v-if="!combo" class="btn btn-primary pull-right">Comprar combos</a> 
					<a href="" v-on:click.prevent="setCombo()" v-if="combo" class="btn btn-warning pull-right">Comprar giftcard</a> 
					<br><br>
					<div class="row" v-show="combo">
						<div class="clearfix"></div>
						<input type="hidden" v-if="combo" name="combo" value="combo">
						<br>
							<div class="col-md-4">
							<div class="thumbnail" :class="{'combo-selected':amount=='50'}">
								<div class="caption">
									<center>
										<b>Combo 1</b><br>
									</center>
								</div>
								<ul class="list-group" >
									<li class="list-group-item" style="padding: 3px;">5 Latas de Atún</li>
									<li class="list-group-item" style="padding: 3px;">1 Kg Cafe</li>
									<li class="list-group-item" style="padding: 3px;">3 Kg de Pasta</li>
									<li class="list-group-item" style="padding: 3px;">3 Kg de Harina de Trigo</li>
									<li class="list-group-item"style="padding: 3px;">1 Nutella</li>
									<li class="list-group-item active text-center" style="padding: 3px;">Precio: 50$</li>
								</ul>
								<a href="" @click.prevent="amount = '50'" class="btn btn-success btn-sm btn-block">Seleccionar</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail" :class="{'combo-selected':amount=='100'}">
								<div class="caption">
									<center>
										<b>Combo 2</b><br>
									</center>
								</div>
								<ul class="list-group" >
									<li class="list-group-item" style="padding: 3px;">8 Latas de Atún</li>
									<li class="list-group-item" style="padding: 3px;">2 Kg Cafe</li>
									<li class="list-group-item" style="padding: 3px;">5 Kg de Pasta</li>
									<li class="list-group-item" style="padding: 3px;">5 Kg de Harina de Trigo</li>
									<li class="list-group-item"style="padding: 3px;">2 Nutella</li>
									<li class="list-group-item active text-center" style="padding: 3px;">Precio: 100$</li>
								</ul>
								<a href="" @click.prevent="amount = '100'" class="btn btn-success btn-sm btn-block">Seleccionar</a>
							</div>
						</div>
							<div class="col-md-4">
							<div class="thumbnail" :class="{'combo-selected':amount=='150'}">
								<div class="caption">
									<center>
										<b>Combo 3</b><br>
									</center>
								</div>
								<ul class="list-group" >
									<li class="list-group-item" style="padding: 3px;">10 Latas de Atún</li>
									<li class="list-group-item" style="padding: 3px;">3 Kg Cafe</li>
									<li class="list-group-item" style="padding: 3px;">8 Kg de Pasta</li>
									<li class="list-group-item" style="padding: 3px;">8 Kg de Harina de Trigo</li>
									<li class="list-group-item"style="padding: 3px;">3 Nutella</li>
									<li class="list-group-item active text-center" style="padding: 3px;">Precio: 150$</li>
								</ul>
								<a href="" @click.prevent="amount = '150'" class="btn btn-success btn-sm btn-block">Seleccionar</a>
							</div>
						</div>	
					</div>
					<br>	
					{{-- FIN COMBOS --}}
				 	<div class="form-group" v-show="!combo">
					 	<label class="form-text" for="amount">Monto: </label>
						<input autocomplete="off"  type="text" name="amount" v-on:keyup="total2()" v-model="amount" id="amount" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="$25.00 - $500.00" required>
						@if ($errors->has('amount'))
						    <span class="invalid-feedback">
						        <strong>{{ $errors->first('amount') }}</strong>
						    </span>
						@endif
				 	</div>
				 	<div class="form-group">
					 	<label class="form-text" for="amount">Total a pagar: </label>
						<input type="text" class="form-control" :value="total" placeholder="Total a pagar" readonly>
				 	</div>
				 	<div class="form-group" v-show="!combo">
					 	<label class="form-text" for="amount">Total reembolsable: </label>
						<input type="text" class="form-control" v-model="totalPay" placeholder="Total a pagar" readonly>
				 	</div>
				 	<button type="submit" class="btn-submit hbtn hbtn-primary hbtn-lg" id="btn-buy">Comprar</button>
				<hr>
					<div class="form-check" v-show="!combo">
					  	<input class="form-check-input" type="checkbox" name="referred" v-model="select" @change="selectGift()">
					  	<label class="form-check-label" for="referred">
							<strong>GiftCard de regalo</strong>
					  	</label>
					</div>
					<div v-if="selected" class="mt-5">
					 	<div class="form-group">
						 	<label class="form-text" for="fullname_referred">Nombre completo: </label>
							<input type="text" name="fullname_referred" class="form-control{{ $errors->has('fullname_referred') ? ' is-invalid' : '' }}" placeholder="Nombre de quien recibe" required>
							@if ($errors->has('fullname_referred'))
							    <span class="invalid-feedback">
							        <strong>{{ $errors->first('fullname_referred') }}</strong>
							    </span>
							@endif
					 	</div>
					 	<div class="form-group">
						 	<label class="form-text" for="email_referred">Email: </label>
							<input type="text" name="email_referred" class="form-control{{ $errors->has('email_referred') ? ' is-invalid' : '' }}" placeholder="user@mail.com" required>
							@if ($errors->has('email_referred'))
							    <span class="invalid-feedback">
							        <strong>{{ $errors->first('email_referred') }}</strong>
							    </span>
							@endif
					 	</div>
					 	<div class="form-group">
						 	<label class="form-text" for="email_referred">Celular: </label> <br>	
						<input style="display: block;" type="tel" name="cell_referred" id="phone" class="form-control">	
						
							@if ($errors->has('cell_referred'))
							    <span class="invalid-feedback">
							        <strong>{{ $errors->first('cell_referred') }}</strong>
							    </span>
							@endif
					 	</div>
				 	 	<div class="form-group">
				 		 	<label class="form-text" for="message">Mensaje: </label>
				 			<textarea class="form-control" name="message" placeholder="Mensaje del regalo (opcional)"></textarea>
				 	 	</div>
					</div>
				 </form>
			</div>
		</div>
	</div>
@endsection
@section('js')

	<script>
	    var app = new Vue({
	        el: '#buy',
	        data: {
	            selected: false,
	            select: null,
	            amount: null,
	            totalPay: 0,
				combo: false,
	        },
	        methods: {
	        	selectGift: function(){
	        		if (this.select) {
	        			this.selected = true;
	        			setTimeout(this.inicializar, 200);
	        		}else{
	        			this.selected = false;
	        		}
	        	},
	        	inicializar: function() {
	        		var input = document.querySelector("#phone");
				    window.intlTelInput(input, {
				      // allowDropdown: false,
				      // autoHideDialCode: false,
				      // autoPlaceholder: "off",
				      // dropdownContainer: document.body,
				      // excludeCountries: ["us"],
				      // formatOnDisplay: false,
				      // geoIpLookup: function(callback) {
				      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
				      //     var countryCode = (resp && resp.country) ? resp.country : "";
				      //     callback(countryCode);
				      //   });
				      // },
				      // hiddenInput: "full_number",
				      // initialCountry: "auto",
				      // localizedCountries: { 'de': 'Deutschland' },
				       nationalMode: false,
				      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
				      // placeholderNumberType: "MOBILE",
				       preferredCountries: ['ve'],
				      // separateDialCode: true,
				      utilsScript: "{{ asset('js/web/utils.js') }}",
				  });
  				},
	        	total2: function (data) {
	        		console.log(data);
	        		cif = 3; dec = 2;
	        		var monto = this.amount;
	        		var total = 0;
	        		if (this.amount) {
	        			axios.get('/api/rate').then(function (response) {
			        		total = ((parseInt(monto))*response.data).toFixed(2);
			        		let inputNum = total;
				        	var resultado = "";
		 
					       inputNum = inputNum.toString()
						  // separamos en un array los valores antes y después del punto
						  inputNum = inputNum.split('.')
						  // evaluamos si existen decimales
						  if (!inputNum[1]) {
						    inputNum[1] = '00'
						  }

						  let separados
						  // se calcula la longitud de la cadena
						  if (inputNum[0].length > cif) {
						    let uno = inputNum[0].length % cif
						    if (uno === 0) {
						      separados = []
						    } else {
						      separados = [inputNum[0].substring(0, uno)]
						    }
						    let posiciones = parseInt(inputNum[0].length / cif)
						    for (let i = 0; i < posiciones; i++) {
						      let pos = ((i * cif) + uno)
						      console.log(uno, pos)
						      separados.push(inputNum[0].substring(pos, (pos + 3)))
						    }
						  } else {
						    separados = [inputNum[0]]
						  }
			        		app.totalPay = 'Bss ' + separados.join(',') + '.' + inputNum[1];
			        	 	
						  }).catch(function (error) {
						    // handle error
						    alert('Ha ocurrido un error al calcular la tasa');
						  });
						}else{
							this.totalPay = 0;
						}
		        },
				setCombo: function () {
					if(this.combo){
						this.combo = false;
						this.amount = "";
					}else{
						this.combo = true;
						this.amount = "";
					}
				}
	        },
	        computed: {
	        	total: function () {
	        		console.log(1)
	        		cif = 3; dec = 2;
		        	let inputNum = (this.amount * 1.05).toFixed(2);
		        	var resultado = "";
 
			       inputNum = inputNum.toString()
				  // separamos en un array los valores antes y después del punto
				  inputNum = inputNum.split('.')
				  // evaluamos si existen decimales
				  if (!inputNum[1]) {
				    inputNum[1] = '00'
				  }

				  let separados
				  // se calcula la longitud de la cadena
				  if (inputNum[0].length > cif) {
				    let uno = inputNum[0].length % cif
				    if (uno === 0) {
				      separados = []
				    } else {
				      separados = [inputNum[0].substring(0, uno)]
				    }
				    let posiciones = parseInt(inputNum[0].length / cif)
				    for (let i = 0; i < posiciones; i++) {
				      let pos = ((i * cif) + uno)
				      console.log(uno, pos)
				      separados.push(inputNum[0].substring(pos, (pos + 3)))
				    }
				  } else {
				    separados = [inputNum[0]]
				  }
				  return '$' + separados.join(',') + '.' + inputNum[1];
        
		        }
	        }
	    });
    
    
    
   /* 
$("#btn-buy").on("click", function(){
  
 
  var route='http://www.giftcardreembolsable.com/sms/';
   
    $.ajax({
       type : 'POST', 
       url : route,
       data:{ 'amount': $('#amount').val(), 'phone': $('#phone').val() },
       dataType: 'json', 
       encode  : true,
       success:function(data){
       console.log(data);

    },
      error:function(error){
          console.log('Error');
   
        
            //$("#msj").html(msj.responseJSON.genre);
            //$("#msj-error").fadeIn();
        }
    });
})
*/
</script>
@endsection

