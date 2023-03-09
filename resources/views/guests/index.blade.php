@extends('layout.admin')

@section('content')
<h1>Guests</h1>

@unless(count($guests) == 0)

<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Invitation ID</td>
        </tr>
    </thead>
    <tbody>
        @foreach($guests as $guest)
        <tr>
            <td>{{ $guest->id }}</td>
            <td>{{ $guest->firstname }}</td>
            <td>{{ $guest->lastname }}</td>
            <td>{{ $guest->invitation_id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
<p>No guests here</p>
@endunless

{{ $guests->links() }}

<form method="POST" action="/guests" enctype="multipart/form-data">
    @csrf
    <input type="text" name="firstname" placeholder="firstname" value="{{old('firstname')}}">
    @error('firstname')
        <p style="color: red;">{{ $message }}</p>
    @enderror
    <input type="text" name="lastname" placeholder="lastname" value="{{old('lastname')}}">
    @error('lastname')
        <p style="color: red;">{{ $message }}</p>
    @enderror
    <input type="text" name="invitation_id" placeholder="invitation" value="{{old('invitation_id')}}">
    @error('invitation_id')
        <p style="color: red;">{{ $message }}</p>
    @enderror
    <button type="submit">Submit</button>
</form>

@endsection