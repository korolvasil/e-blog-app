<div class="header-container">
    <div class="inner">
        <div class="row">
            <div class="header-brand">
                {{-- BRAND --}}
                <a class="brand-link" href="{{ route('home') }}">
                    @include('layouts.partials.brand')
                </a>
            </div>
            <nav class="header-nav">
                <ul>
                    @auth
                        @role('admin')
                        <li><a href="{{ route('admin.panel') }}">Admin Panel</a></li>
                        @endrole
                        <li><a href="">{{ auth()->user()->name }}</a></li>

                        {{-- LOGOUT --}}
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        {{--END LOGOUT--}}
                    @else
                        <li><a href="{{ route('login') }}"><span>Sign in</span></a></li>
                        <li><a href="{{ route('register') }}"><span>Sign up</span></a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </div>
</div>
