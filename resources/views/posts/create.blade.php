@extends('layouts.app')
@section('title', ' - Post Create')
    

@section('content')  
    <div class="uk-container">
        <div class="section">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('index') }}">Главная</a></li>
                <li><span>Добавить пост</span></li>
            </ul>
            <div class="section-title">
                <h3>Добавить пост</h3>
            </div>
            
        </div>
        <!-- /.section -->
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="uk-card">
                <div class="uk-card-body">
                    <div class="uk-margin">
                        <input type="text" name="title" placeholder="Title" class="uk-input">
                    </div>
                    
                    <div class="uk-margin">
                        <textarea type="text" name="content" placeholder="Content" rows="10" class="uk-textarea"></textarea>
                    </div>
                    
                    <div class="uk-margin">
                        <div >
                            <input class="uk-input " id="image" name="image" type="file" placeholder="Select image">
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