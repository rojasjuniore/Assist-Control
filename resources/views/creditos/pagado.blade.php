@if(session('message'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-danger text-center">{{session('message')}}</div>
            </div>
        </div>
    </div>
@endif

{{Auth::user()->id_cliente}}

<h1>Credito Comprado</h1>