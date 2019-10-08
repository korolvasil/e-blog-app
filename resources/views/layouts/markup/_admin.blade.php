@section('style', asset('css/main_admin.css'))
@section('id', 'admin')
@component('layouts/markup/_body')
    <script src="{{ asset('js/admin-panel.js') }}" {{--defer--}}></script>
@endcomponent
