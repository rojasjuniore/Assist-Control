
@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
<script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('css')

@endsection
@section('content')

<div style="padding:50px;">
    <center><h1 style="color:#000;"> Paquete no encontrado</h1></center>
</div>


          


 
@endsection
@section('js')

@endsection