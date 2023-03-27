@extends('layouts.admin')

@section('title', 'User List')

@section('content')


    <div class="card mb-3 mt-5 mx-auto" style="width: 15%">
            <img
                                        src="{{ $user->profile == null ? asset('storage/images/default.png') : asset($user->profile) }}"
                                        alt="{{ $user->name }}" width="100%" />
            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <p class="card-text">{{$user->email}}</p>
            </div>
    </div>
@endsection