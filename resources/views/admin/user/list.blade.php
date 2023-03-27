@extends('layouts.admin')

@section('title', 'Users List')

@section('content')
    <h2 class="text-danger text-center">Users</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Users List</h4>
            <div class="d-flex gap-4">
                <form class="input-group" action="{{ route('users.index') }}" method="get">
                    <input type="search" name="search" class="form-control" placeholder="Search"
                        value="{{ request()->input('search') }}" aria-describedby="helpId">
                    <button class="btn btn-md btn-warning" title="Search" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="{{ route('users.create') }}" class="btn btn-md btn-info w-50">Add New User</a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Activated</th>
                            <th scope="col">Creation date</th>
                            <th scope="col">Update date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userList as $user)
                            <tr>
                                <td scope="row">{{ $user->id }}</td>
                                <td scope="row">{{ $user->name }}</td>
                                <td scope="row">{{ $user->email }}</td>
                                <td scope="row"> <img
                                        src="{{ $user->profile == null ? asset('storage/images/default.png') : asset($user->profile) }}"
                                        alt="{{ $user->name }}" width="50px" height="50px" /></td>
                                <td scope="row">{{ $user->activated ? 'Activated' : 'Not Activated' }}</td>
                                <td scope="row">{{ $user->created_at }}</td>
                                <td scope="row">{{ $user->updated_at }}</td>
                                <td scope="row">
                                    <div class="input-group">
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('users.edit', ['user' => $user->id]) }}" title="Edit"
                                            role="button">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-secondary"
                                            href="{{ route('users.show', ['user' => $user->id]) }}" title="Details"
                                            role="button">
                                            <i class="bi bi-eye"></i>
                                        </a>


                                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
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
            {{ $userList->links() }}
        </div>
    </div>
@endsection
