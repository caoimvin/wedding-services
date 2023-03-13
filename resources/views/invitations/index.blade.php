@extends('layout.admin')

@section('content')
<h1>Invitations</h1>

@unless(count($invitations) == 0)

@foreach($invitations as $invitation)
<div class="invitation">
    <h2>{{ $invitation->recipient }}</h2>
    <div class="invitation-guests">
        @unless(count($invitation->guests) == 0)
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Firstname</td>
                    <td>Lastname</td>
                </tr>
            </thead>
            <tbody>
                @foreach($invitation->guests as $guest)
                <tr>
                    <td>{{ $guest->id }}</td>
                    <td>{{ $guest->firstname }}</td>
                    <td>{{ $guest->lastname }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endunless
        <div class="guest-create">
            Add new Guest
        </div>
    </div>
</div>
@endforeach

@else
<p>No invitations here</p>
@endunless

{{ $invitations->links() }}

@endsection