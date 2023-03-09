@extends('layout.admin')

@section('content')
<h1>Invitations</h1>

@unless(count($invitations) == 0)

<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Recipient</td>
        </tr>
    </thead>
    <tbody>
        @foreach($invitations as $invitation)
        <tr>
            <td>{{ $invitation->id }}</td>
            <td>{{ $invitation->recipient }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
<p>No invitations here</p>
@endunless

@endsection