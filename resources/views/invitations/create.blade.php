@extends('layout.admin')

@section('content')
<h1>Invitations</h1>

<div class="invitation">
    <h2>Create Invitation</h2>
    <form method="POST" action="/invitation">
        @csrf
        <input type="text" name="recipient" value="{{ old('recipient') }}" placeholder="recipient">
        <input type="text" name="access_name" value="{{ old('access_name') }}" placeholder="access_name">
        <input type="text" name="access_code" value="{{ old('access_code') }}" placeholder="access_code">
        <button type="submit">Submit</button>
    </form>
</div>

@endsection