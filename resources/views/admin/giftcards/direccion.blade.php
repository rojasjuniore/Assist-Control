@extends('admin.layout')



@section('title', 'Reembolso de GiftCard')



@section('breadcrumb')


	<ol class="breadcrumb">

	    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>

	    <li class="breadcrumb-item active">Datos de envio de combo</li>

	</ol>

@endsection



@section('content')

    @if (session('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <strong>{{ session('message') }}</strong>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

    @endif

    <div class="horizontal-form">

        <form action="{{ route('giftcards.direccion-agregar') }}" class="form-horizontal row" method="post">

            <input type="hidden" class="form-control" name="id" value="{{$giftcard->id}}" required>

        	{{ csrf_field() }}

            <div class="col-md-7 col-xs-12">

                <div class="form-group">

                    <label for="control-label" class="control-label">Nombre</label>

                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>

                </div>

                <div class="form-group">

                    <label for="control-label" class="control-label">Teléfono</label>

                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>

                </div>

                  <div class="form-group">

                    <label for="control-label" class="control-label">Dirección</label>

                    <input type="text" name="direccion" class="form-control" placeholder="Dirección" required>

                </div>


            </div>


            </div>

            <div class="form-group">

                <div class="col-sm-offset-2 col-sm-10">

                    <button type="submit" class="btn btn-success">Enviar</button>

                </div>

            </div>

        </form>

    </div>            

@endsection