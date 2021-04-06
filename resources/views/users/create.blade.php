@extends('layouts.app')
@section('title', ' - Post Create')
    

@section('content')  
    <div class="uk-container">
        <div class="section">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('index') }}">Главная</a></li>
                <li><span>Добавить пользователя</span></li>
            </ul>
            <div class="section-title">
                <h3>Добавить пользователя</h3>
            </div>
        </div>
        <!-- /.section -->
        @if ($errors->any())
            <div class="uk-alert uk-text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="uk-card">
                <div class="uk-card-body">
                    <div class="uk-margin">
                        <input type="text" name="name" @error('name') is-invalid @enderror placeholder="User name" class="uk-input">
                        @error('name')
                            <span class="uk-text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="uk-margin">
                        <input type="text" name="email" @error('email') is-invalid @enderror placeholder="Email" class="uk-input">
                        @error('email')
                            <span class="uk-text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <input type="password" name="password"  @error('password') is-invalid @enderror placeholder="Password" class="uk-input">
                        @error('password')
                            <span class="uk-text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin uk-flex uk-flex-around">
                        <div>
                            <button class="uk-button uk-button-default" type="button">Select Position</button>
                            @error('position')
                                <span class="uk-text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div uk-dropdown="mode: click"  style="width: 200%">
                                @foreach ($positions as $position)
                                    <div class="controls">
                                        <input type="radio"  value="{{ $position->id }}" name="position_id" @error('position') is-invalid @enderror class="uk-radio">
                                        <label for="" class="uk-form-label">{{ $position->title }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <button class="uk-button uk-button-default" type="button">Select Departments</button>
                            <div uk-dropdown="mode: click"  style="width: 200%">
                                @foreach ($departments as $department)
                                    <div class="controls">
                                        <input type="checkbox"  value="{{ $department->id }}" name="departments[]" class="uk-checkbox">
                                        <label for="" class="uk-form-label">{{ $department->title }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <table>
                        <tr>
                            <td class="uk-width-small">Role
                                
                            </td>
                            @foreach ($roles as $role)
                                <td>
                                    <input type="radio"  value="{{ $role->id }}" name="roles[]"   @error('roles') is-invalid @enderror  class="uk-radio">
                                    <label for="" class="uk-form-label uk-margin-small-right">{{ $role->name }}</label>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @error('roles')
                                <span class="uk-text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </tr>
                    </table>
                    <div class="uk-margin">
                        <div>
                            <input class="uk-input" id="image" name="image" type="file" placeholder="User photo">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <button type="submit" class="uk-button uk-button-primary"> Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection