@extends('layouts.admin')

@section('title', 'Post List')

@section('content')
    <h2 class="text-danger text-center">Posts</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Create Post</h4>

            <a href="{{ route('posts.index') }}" class="btn btn-md btn-info ">Post List</a>


        </div>
        <div class="card-body">

            <form>
                <div class="mb-3 row">
                    <label for="title" class="col-4 col-form-label">Title</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Action</button>
                    </div>
                </div>
            </form>



        </div>
    </div>
@endsection
