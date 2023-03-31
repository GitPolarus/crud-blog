@extends('layouts.admin')

@section('title', 'Comment List')

@section('content')

<h2 class="text-danger text-center">Comments</h2>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Comment List</h4>
        <div class="d-flex gap-4">
            <form class="input-group" action="{{ route('comments.index') }}" method="get">
                <input type="search" name="search" class="form-control" placeholder="Search"
                    value="{{ request()->input('search') }}" aria-describedby="helpId">
                <button class="btn btn-md btn-warning" title="Search" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Message</th>
                        <th scope="col">Author</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Approved</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commentList as $comment)
                        <tr>
                            <td scope="row">{{ $comment->id }}</td>
                            <td scope="row">{{ $comment->message }}</td>
                            <td scope="row">{{ $comment->author->name }}</td>
                            <td scope="row">{{ $comment->post->title }} </td>
                            <td scope="row">{{ $comment->approved ? 'approved' : 'Not approved' }}</td>
                            <td scope="row">
                                <div>
                                    <form action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="POST">
                                            <input class="form-check-input" type="checkbox" {{ $comment->approved == false ? '' : 'checked' }}
                                                role="switch" id="approved" name="approved">
                                    </form>
                
                                    <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" title="Delete" role="button">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer">
        {{-- {{ $commentList->links() }} --}}
    </div>
</div>
@endsection