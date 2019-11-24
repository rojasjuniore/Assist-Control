@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('content')
    <section class="content-header">
        <h1>
            Medicamento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($medicamento, ['route' => ['medicamentos.update', $medicamento->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('medicamentos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection