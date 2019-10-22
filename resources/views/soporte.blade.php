@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection


@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>


    
@endpush

@section('content')
@if(Auth::user()->rol == 'admin')
    <iframe style="width:100%; height: 100vh; border:none;" src="https://chat.efectylogistic.com/administrator"></iframe>
@else
<iframe style="width:100%; height: 100vh; border:none;" src="https://chat.efectylogistic.com/client?email={{Auth::user()->email}}"></iframe>
@endif
        

@endsection






