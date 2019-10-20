@extends('templates.material.main')

@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection

@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Finalizando el pago</h1><br><br>
        <div class="row align-items-center">
        <div class="col-md-12 align-self-center">
            <h1></h1>
            <center>
            
                @if (session('error') || session('success'))
                <img src="{{asset('images/paypal.png')}}" alt="">
                <p class="{{ session('error') ? 'error':'success' }}">
                 {{ session('error') ?? session('success') }}
                </p>
                @else
                <center>
                <img width="30%" src="{{asset('images/stripelogo.png')}}" alt="">
                <h3>Pago realizado con exito</h3>
                </center>
                @endif
               
            </center>
        </div>
    </div>
            
            
    </div>
</div>


     
   <script>
       function goBack() {
  window.history.back();
}
   </script>
  

@endsection







