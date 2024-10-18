@extends('users.layout')

@section('title')
<title>login page</title>
@endsection


@section('content')

<h1>welcome back to login..</h1>

<form action="/login" method="post">
    @csrf
    {{-- email input --}}
    <div class="form-group mt-3">
        <label for="" class="form-label">Email</label>
        <input type="email" name="email" class="form-control
        @error('email') is-invalid @enderror"
        value="{{ old('email') }}">

        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- password input --}}
    <div class="form-group mt-3">
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" class="form-control
        @error('password') is-invalid @enderror">

        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <input type="checkbox" name="remember_me" value="1" >
        <label for="">Remember Me</label>

        @error('remember_me')
            {{ $message }}
        @enderror
    </div>
    <button class="btn btn-primary my-3">login</button>
    <a href="/register">Create Acount</a>
</form>
@endsection
