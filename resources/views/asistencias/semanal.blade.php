@extends('layouts.app')

@section('css')
    <link href="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    {{----}}
    {{--.bootstrap-datetimepicker-widget .datepicker-days table tbody tr:hover {--}}
    {{--background-color: #eee;--}}
    {{--}--}}

    <style>
        .datepicker table tr:hover {
            background: #eee;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ _i('Semanal') }}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">{{ _i('Escoja un Mes') }}:</label>
                            <div class="input-group">
                                <input id="weeklyDatePicker" type="text" class="form-control mydatepicker" value="{{$hoy}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                </div>
                            </div>                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive" id="contenido"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/vendor/wrappixel/material-pro/4.2.1/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/vendor/wrappixel/material-pro/4.2.1/assets/plugins/moment/moment.js')}}"></script>
    <script src="{{ asset('js/datePickerSemanal.js') }}"></script>

    <script src="{{ asset('js/buscarSemanal.js') }}"></script>
@endsection
