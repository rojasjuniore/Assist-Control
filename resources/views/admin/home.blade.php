@extends('admin.layout')

@section('rate')
	@include('admin.partials.form-rate')
	
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
	@if (Auth::user()->role === 'user')
		@include('admin.partials.home-user')
	@else
		{{-- @include('admin.partials.home-admin') --}}
	@endif
@endsection
