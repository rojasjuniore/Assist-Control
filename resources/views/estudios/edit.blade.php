@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('nombre_modulo', 'Estudios')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('estudios.index')}}">Estudios</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Estudios
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estudios, ['route' => ['estudios.update', $estudios->id], 'method' => 'patch', 'style'=>'width: 100%']) !!}

                        @include('estudios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
