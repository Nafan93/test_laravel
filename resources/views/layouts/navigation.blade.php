
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">Test Laravel</a>
        <ul class="uk-navbar-nav">
            <li>
                <a href="{{ route('posts.create') }}"> Create </a>
            </li>
        </ul>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li>
                                    <a  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            
                        </div>
                    </li>
                @endguest
            </li>
        </ul>
    </div>
</nav>