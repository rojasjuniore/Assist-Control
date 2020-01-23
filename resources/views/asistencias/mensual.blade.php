@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ _i('Mensual') }}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Escoja un Mes:</label>
                            <select name="selectMes" id="selectMes" class="form-control">
                                <option value="">:: Seleccione ::</option>
                                @foreach($meses AS $i=>$mes)
                                    <option value="{{($i+1)}}" @if ($mesActual==($i+1)) selected @endif>{{$mes}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Escoja un Año:</label>
                            <select name="selectAno" id="selectAno" class="form-control">
                                <option value="">:: Seleccione ::</option>
                                <option value="2020" @if($anoActual==2020) selected @endif>2020</option>
                                <option value="2021" @if($anoActual==2021) selected @endif>2021</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive" id="contenido"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/buscarMensual.js') }}"></script>
@endsection
