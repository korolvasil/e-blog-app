@extends('layouts.markup._public')

@section('app')
    {{--MainHeader--}}
    <header>
        {{--TopBar--}}
        @include('layouts.public.partials.header.top-bar')
        {{--Header--}}
        @include('layouts.public.partials.header.header')
        {{--MainNav--}}
        @include('layouts.public.partials.header.main-nav')
    </header>
    {{--MainPage--}}
    <main class="mt-4">
        <div class="container">
            <div class="row">
                {{--Left Column--}}
                <div class="col">
                    @yield('content')
                </div>
                {{--Right Column if exists--}}
                @hasSection('aside')
                    <div class="col">
                        @yield('aside')
                    </div>
                @endif
            </div>
        </div>
    </main>
    {{--MainFooter--}}
    <footer>Footer</footer>
@endsection
