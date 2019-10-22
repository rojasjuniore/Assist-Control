@extends('admin.layout')

@section('title', 'GiftCard de regalo')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('giftcards.index') }}">GiftCards</a></li>
	    <li class="breadcrumb-item active">Giftcard de regalo</li>
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
    <div class=form">
        <form action="{{ route('giftcards.save-referred') }}" class="form" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
    		<div class="form-group">
    		    <label class="control-label">Código de Giftcard: </label>
    		    <input type="text" class="form-control" name="referred_code" required>
    		</div>

            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
@endsection