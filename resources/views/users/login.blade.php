@extends('layout.login')

@section('content')
login
<form method="POST" action="/users/auth">
@csrf
<input type="text" name="email" placeholder="email">
<input type="text" name="password" placeholder="password">
<button type="submit">Submit</button>
</form>

@endsection