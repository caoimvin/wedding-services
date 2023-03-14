@extends('layout.admin')

@section('content')
<h1>Create Guest</h1>

<form method="POST" action="/guest" enctype="multipart/form-data">
    @csrf
    <input type="text" name="firstname" placeholder="firstname" value="{{old('firstname')}}">
    @error('firstname')
        <p style="color: red;">{{ $message }}</p>
    @enderror
    <input type="text" name="lastname" placeholder="lastname" value="{{old('lastname')}}">
    @error('lastname')
        <p style="color: red;">{{ $message }}</p>
    @enderror
    <input type="hidden" name="invitation_id" placeholder="invitation" value="{{ $invitation_id }}">
    @error('invitation_id')
        <p style="color: red;">{{ $message }}</p>
    @enderror
    <button type="submit">Submit</button>
</form>

@endsection