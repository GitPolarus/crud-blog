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
                    <button class="btn btn-md btn-warning" title="Search" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
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
                                <td scope="row">{{ $post->author->name }}</td>
                                <td scope="row"> <img
                                        src="{{ $post->photo == null ? asset('storage/images/default.png') : $post->photo }}"
                                        alt="{{ $post->title }}" width="50px" height="50px" /></td>
                                <td scope="row">{{ $post->published ? 'published' : 'Not published' }}</td>
                                <td scope="row">
                                    <div class="input-group">
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('posts.edit', ['post' => $post->id]) }}" title="Edit"
                                            role="button">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-secondary" href="#" title="Details" role="button">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="#" title="Delete" role="button">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
