@extends('layouts.app')

@section('content')
<div class="uk-container">
    <div class="section">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><span>{{ __('Login') }}</span></li>
        </ul>
        <div class="section-title">
            <h3>{{ __('Login') }}</h3>
        </div>
        <div class="uk-flex uk-flex-center">
            <div class="uk-width-3-4 uk-flex uk-flex-center">
                <div class="uk-card">
                    <div class="uk-card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="uk-margin">
    
                                <div class="">
                                    <input id="email" type="email" class="uk-input  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail" autofocus>
    
                                    @error('email')
                                        <span class="uk-text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="uk-margin">
    
                                <div class="">
                                    <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Пароль">
    
                                    @error('password')
                                        <span class="uk-text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                           Запомнить
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="uk-card-footer">
                                <div class="uk-inline">
                                    <button type="submit" class="uk-button uk-button-primary">
                                        Войти
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="uk-button uk-button-link" href="{{ route('password.request') }}">
                                            Забыли пароль?
                                        </a>
                                    @endif
                                </div>
                                <hr >
                                <div class="uk-flex uk-flex-center uk-flex-column">
                                    <span class="uk-align-center">
                                        Нет аккаута? 
                                        <a class="uk-button-link" href="{{ route('register') }}">
                                            {{ __('Зарегистрируйтесь') }}
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
