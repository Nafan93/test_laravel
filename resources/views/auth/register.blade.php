@extends('layouts.app')

@section('content')
<div class="uk-container">
    <div class="section">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><span>{{ __('Register') }}</span></li>
        </ul>
        <div class="section-title">
            <h3>{{ __('Register') }}</h3>
        </div>
        <div class="uk-flex uk-flex-center">
            <div class="uk-width-3-4 uk-flex uk-flex-center">
                <div class="uk-card">
                    <div class="uk-card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="uk-margin">
    
                                <div class="">
                                    <input id="name" type="text" class="uk-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Ваше имя" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="uk-margin">
                                <div class="">
                                    <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Ваш e-mail" autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="uk-margin">
    
                                <div class="">
                                    <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required placeholder="Придумайте надежный пароль" autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="uk-margin">
    
                                <div class="">
                                    <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required placeholder="Введите пароль еще раз" autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="uk-card-footer">
                                <div class="uk-inline">
                                    <button type="submit" class="uk-button uk-button-primary">
                                        Зарегистрироваться
                                    </button>
                                </div>
                                <hr >
                                <div class="uk-flex uk-flex-center uk-flex-column">
                                    <span class="uk-align-center">
                                        Есть аккаунт? 
                                        <a class="uk-button-link" href="{{ route('login') }}">
                                            {{ __('Войти') }}
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
