@extends('layout.admin')

@section('content')
<h1>Invitations</h1>

<div class="invitation">
    <h2>Edit Invitation: {{ $invitation->recipient }}</h2>
    <form method="POST" action="/invitation/{{ $invitation->id }}">
        @csrf
        @method('PUT')
        <input type="text" name="recipient" value="{{ $invitation->recipient }}">
        <input type="text" name="access_name" value="{{ $invitation->access_name }}">
        <button type="submit">Submit</button>
    </form>
</div>

<form method="POST" action="/invitation/{{ $invitation->id }}">
    @csrf
    @method('DELETE')
    <button type="submit">Remove Invitation</button>
</form>

@endsection