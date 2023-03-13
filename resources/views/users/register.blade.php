@extends('layout.admin')

@section('content')
register
<form method="POST" action="/users">
@csrf
<input type="text" name="name" placeholder="name">
<input type="text" name="email" placeholder="email">
<input type="text" name="password" placeholder="password">
<input type="text" name="password_confirmation" placeholder="password_confirmation">
<button type="submit">Submit</button>
</form>

@endsection