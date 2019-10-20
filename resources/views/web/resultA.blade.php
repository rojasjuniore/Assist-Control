@extends('web.template')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="row">
				@if(!empty($results))
					@foreach($results as $item)
						@if(substr($item->price, 0, 1) == "$")
							<script>
						    	
						  	</script>
						@endif
						<?php 
							$porcentaje = rand(10,35);
							$antesp = $porcentaje/100;
							$antesp = $antesp+1;
						?>  

						<div class="col-md-3">
							<div class="card" style="margin-top: 20px;">
								<div class="card-header">
									<h2 style="color:#e47911;">{{$porcentaje}}% OFF</h2>
								</div>
								<div class="card-body">
									<h5 class="card-title" style="color: #0066c0;">
										{{substr($item->title,0,32)}}... 
									</h5>
									<?php 
						              $pfiltro = str_replace ('$','',$item->price);
						              $antes = number_format($pfiltro*$antesp,2, '.', ',');
						            ?>
						            @if($antes>0) 
						               <?php $strike = "Antes : USD".$antes; ?>
						            @else
						            	<?php $strike = '' ?>
						            @endif
						            @if (isset($item->prime)) 
						            <?php  $prime = ''; ?>
						            @else
						            <?php  $prime = ''; ?>
						            @endif
						            @if(empty($item->image))
						            <?php $imgs = ""; ?>
						            @endif
									<center><img style="max-height: 180px; margin: 0 auto" src="{{$item->image}}" class="img-responsive" alt="" title="" /></center>
								</div>
								<div class="card-footer" style="font-weight: 400 !important;">
									{{$strike}} <br>
						            {{'US'.$item->price.$prime}}
								</div>
							</div>
						</div>

					@endforeach
				@endif
			</div>
			<div style="margin-top: 20px;margin-bottom: 20px;">
				<nav aria-label="...">
				  <ul class="pagination">
				  	@if($page-1 < 1)
				    <li class="page-item disabled">
				      	<a class="page-link" href="/results/{{$page-1}}?busqueda={{$busqueda}}">Anterior</a>
				    </li>
				    @else
				    <li class="page-item">
				      	<a class="page-link" href="/results/{{$page-1}}?busqueda={{$busqueda}}">Anterior</a>
				    </li>
				    @endif
				    <li class="page-item disabled"><a href="#" class="page-link">Pagina {{$results[0]->paginaActual}} de {{$results[0]->ultimaPagina}}</a></li>
				    <li class="page-item">
				      <a class="page-link" href="/results/{{$page+1}}?busqueda={{$busqueda}}">Siguiente</a>
				    </li>
				  </ul>
				</nav>
			</div>
		</div>
	</div>
</div>

@endsection