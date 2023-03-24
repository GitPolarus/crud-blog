@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <h2 class="text-danger text-center">Users</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Edit User</h4>

            <a href="{{ route('users.index') }}" class="btn btn-md btn-info ">User List</a>


        </div>
        <div class="card-body">

            <form method="post" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="col-4 col-form-label">Name</label>
                    <div class="col-6">
                        <input type="text"
                            class="form-control @error('name')
                        is-invalid
                    @enderror"
                            name="name" id="name" placeholder="Name" value="{{ old('name', $user->name) }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="col-4 col-form-label">Email</label>
                    <div class="col-6">
                        <input type="email"
                            class="form-control @error('email')
                            is-invalid
                        @enderror"
                            name="email" id="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                    </div>
                </div>

                <div class="mb-3">

                    <div class="col-6">
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="activated">Activated</label>
                            <input class="form-check-input" type="checkbox" {{ $user->activated == false ? '' : 'checked' }}
                                role="switch" id="activated" name="activated">
                        </div>
                    </div>
                </div>

                <div class="mb-3">

                    <div class="col-6">
                        <label for="role" class="col-4 col-form-label">Role</label>
                        <select class="form-select" id="role" name="role">
                            
                            <option value="Member">Member</option>
                            <option {{ $user->role == 'Admin' ? 'selected' : '' }} value="Admin">Admin</option>
                        </select>
                    </div>
                    
                </div>

                {{-- <div class="mb-3">
                    <label for="photo" class="col-4 col-form-label">Photo</label>
                    <div class="col-6">
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*"
                            placeholder="Photo">
                    </div>
                </div> --}}

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
