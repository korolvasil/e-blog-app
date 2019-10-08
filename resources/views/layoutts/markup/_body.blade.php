@extends('layouts/markup/_document')

@section('body')
    <body id="@yield('id')">
        <div id="app">
            @yield('app')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script>feather.replace()</script>
        {{ $slot }}
    </body>
@endsection
