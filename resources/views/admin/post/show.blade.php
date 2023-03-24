@extends('layouts.admin')

@section('title', 'Post List')

@section('content')


    <div class="card mb-3 mt-5 mx-auto" style="width: 15%">
            <img src="{{ $post->photo == null ? asset('storage/images/default.png') : asset($post->photo) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <p class="card-text">Created by : {{$post->author->name}}</p>
            </div>
    </div>
@endsection