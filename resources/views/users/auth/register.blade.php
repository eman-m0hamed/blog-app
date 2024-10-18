@extends('users.layout')

@section('title')
    <title>User Register</title>
@endsection


@section('content')
    <h1>welcome to our website</h1>

    <form action="/register" method="post" class="" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <label for="" class="form-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror"
            name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="" class="form-label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror"
            name="email" type="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="" class="form-label">Password</label>
            <input class="form-control @error('password') is-invalid @enderror"
            name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="" class="form-label">profile Image</label>
            <input class="form-control @error('image') is-invalid @enderror"
            name="image" type="file">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button class="btn btn-primary my-5" type='submit'>Register</button>

        <a href='/login'>Already have account</a>
    </form>
@endsection
