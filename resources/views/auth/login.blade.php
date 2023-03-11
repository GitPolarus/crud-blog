@extends('layouts.basic')

@section('title', 'Register')

@section('content')
    <main class="form-signin w-50 m-auto mt-3">
        <form method="post" action={{ route('login') }}>
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign In</h1>

            <div class="form-floating my-2">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating my-2">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password">
                <label for="password">Password</label>
            </div>

            <button class="btn btn-md btn-primary" type="submit">Login</button>

        </form>
    </main>
@endsection
