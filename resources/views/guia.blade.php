@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection

<style>
.ticket{
    width: 40%;

}
    @media only screen and (max-width: 600px) {
        .ticket{
            width: 30%;
            padding: 15px;
        }
    }
</style>
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>


    
@endpush

@section('content')
  <h1>Generador guias pdf</h1>
  <div class="card">
    <div class="card-body">
   		<a href="storage/{{$code}}.pdf">Descargar guia PDF</a>
    </div>
</div>

@endsection




