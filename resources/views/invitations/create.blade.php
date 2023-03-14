@extends('layout.admin')

@section('content')
<h1>Invitations</h1>

<div class="invitation">
    <h2>Create Invitation</h2>
    <form method="POST" action="/invitation">
        @csrf
        <input type="text" name="recipient" value="{{ old('recipient') }}">
        <input type="text" name="password" value="{{ old('password') }}">
        <button type="submit">Submit</button>
    </form>
</div>

@endsection