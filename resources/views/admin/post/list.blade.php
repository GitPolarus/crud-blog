@extends('layouts.admin')

@section('title', 'Post List')

@section('content')
    <h2 class="text-danger text-center">Posts</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Post List</h4>
            <div class="d-flex gap-4">
                <form class="input-group">
                    <input type="text" class="form-control" placeholder="Search" aria-describedby="helpId">
                    <button class="btn btn-md btn-warning" type="submit">Search</button>
                </form>
                <a href="{{ route('posts.create') }}" class="btn btn-md btn-info w-50">Add New Post</a>
            </div>

        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col">Author</th>
                            <th scope="col">photo</th>
                            <th scope="col">published</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postList as $post)
                            <tr>
                                <td scope="row">{{ $post->id }}</td>
                                <td scope="row">{{ $post->title }}</td>
                                <td scope="row">{{ $post->title }}</td>
                                <td scope="row">{{ $post->title }}</td>
                                <td scope="row">{{ $post->published }}</td>
                                <td scope="row"><a class="btn btn-sm btn-primary" href="#" role="button">Edit</a>
                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
