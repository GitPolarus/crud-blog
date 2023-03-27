@extends('layouts.basic')

@section('title', 'Register')

@section('content')

    <main class="form-signin w-50 m-auto mt-3">
        <form method="post" action={{ route('register') }}>
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign Up</h1>

            <div class="form-floating my-2">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingName" name="name"
                    value="{{ old('name') }}">
                <label for="floatingName">Name</label>
            </div>
            <div class="form-floating my-2">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating my-2">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password">
                <label for="password">Password</label>
            </div>
            <div class="form-floating my-2">
                <input type="password" class="form-control " id="password_confirmation" name="password_confirmation">
                <label for="password_confirmation">Confirm Your Password</label>
            </div>

            <button class="btn btn-md btn-primary" type="submit">Sign Up</button>

        </form>
    </main>
@endsection
