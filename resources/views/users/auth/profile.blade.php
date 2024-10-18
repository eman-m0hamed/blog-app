@extends('users.layout')

@section('title')
<title>profile page</title>
@endsection

@section('content')
<h1>profile</h1>
<p>name: {{ $user->name }}</p>
@endsection
