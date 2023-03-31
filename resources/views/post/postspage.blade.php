@extends('layouts.basic')

@section('title', 'All Posts')

@section('content')
    <h2 class="text-danger text-center">Posts</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">All Crud Blog Posts</h4>
            <div class="d-flex gap-4">
                <form class="input-group" action="{{ route('posts.index') }}" method="get">
                    <input type="search" name="search" class="form-control" placeholder="Search" value="{{ request()->input('search') }}"  aria-describedby="helpId">
                    <button class="btn btn-md btn-warning" title="Search" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        

                        @foreach ($postList as $post)
                           <section> 
                                <div>{{ $post->title }}</div>
                                <div>{{ $post->author->name}}</div>
                                <div>   
                                    <img
                                        src="{{ $post->photo == null ? asset('storage/images/default.png') : $post->photo }}"
                                        alt="{{ $post->title }}" width="50px" height="50px"/>
                                </div>
                                
                            <div class="input-group" >
                                <form method="post" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                    <label for="content" class="col-4 col-form-label">Comment</label>
                                    <div class="col-6">
                                    <textarea type="text"
                                    class="form-control @error('message')
                                    is-invalid
                                    @enderror"
                                    name="message" id="message" placeholder="Write a comment">{{ old('message') }}</textarea>
                                    <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>

                                
                            </div>
                </div>
                            </section>       
                        @endforeach 
            </div>
        </div>
    </div>
@endsection
