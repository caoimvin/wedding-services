@extends('layout.admin')

@section('content')
<h1>Edit Guest {{ $guest->id }}</h1>

<form method="POST" action="/guest/{{$guest->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="firstname" placeholder="firstname" value="{{$guest->firstname}}">
    @error('firstname')
        <p style="color: red;">{{ $message }}</p>
    @enderror
    <input type="text" name="lastname" placeholder="lastname" value="{{$guest->lastname}}">
    @error('lastname')
        <p style="color: red;">{{ $message }}</p>
    @enderror
    <input type="text" name="invitation_id" placeholder="invitation" value="{{$guest->invitation_id}}">
    @error('invitation_id')
        <p style="color: red;">{{ $message }}</p>
    @enderror
    <button type="submit">Submit</button>
</form>

<form method="POST" action="/guest/{{ $guest->id }}">
    @csrf
    @method('DELETE')
    <button type="submit">Remove Guest</button>
</form>

@endsection