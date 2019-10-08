@section('style', asset('css/main_public.css'))
@section('id', 'public')
@component('layouts/markup/_body')
    <script src="{{ asset('js/app.js') }}" {{--defer--}}></script>
@endcomponent
