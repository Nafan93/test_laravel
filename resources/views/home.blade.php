@extends('layouts.app')

@section('title', ' - Home Page')
@section('content')
<div class="uk-container">
    @foreach ($posts as $post)
        
    <div class="uk-card uk-card-default  uk-width-1-1 uk-margin-small">
        <div class="uk-card-body">
            <div class="uk-flex">
                <div class="uk-width-medium ">
                    @if (isset($post->image))
                        <img src="{{ $post->image }}" alt="{{ $post->slug }}">
                    @else
                        <span>no image</span>
                    @endif
                </div>
                <div class="uk-margin-small-left uk-width-expand">
                    <h3 class="uk-card-title">{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
            <div class="uk-flex uk-flex-right uk-margin-small">
                <p>Posted at: {{ date('d.m.Y', strtotime($post->created_at)) }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
