@extends('layout.admin')

@section('content')
<h1>Invitations</h1>
<a href="/invitation">create-invitation</a>
<hr>

@unless(count($invitations) == 0)

@foreach($invitations as $invitation)
<div class="invitation">
    <h2>{{ $invitation->recipient }}</h2>
    <details>
        <summary>details</summary>
        <table>
            <thead>
                <tr>
                    <td>A</td>
                    <td>B</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>test</td>
                    <td>test</td>
                </tr>
            </tbody>
        </table>
    </details>
    {{-- <a href="/invitation/{{ $invitation->id }}">show-invitation</a> --}}
    <a href="/invitation/{{ $invitation->id }}">edit-invitation</a>
    <div class="invitation-guests">
        @unless(count($invitation->guests) == 0)
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Firstname</td>
                    <td>Lastname</td>
                    <td><a href="/guest?invitation={{ $invitation->id }}">new-guest</a></td>
                </tr>
            </thead>
            <tbody>
                @foreach($invitation->guests as $guest)
                <tr>
                    <td>{{ $guest->id }}</td>
                    <td>{{ $guest->firstname }}</td>
                    <td>{{ $guest->lastname }}</td>
                    <td><a href="/guest/{{ $guest->id }}">edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <a href="/guest?invitation={{ $invitation->id }}">create-guest</a>
        @endunless
        {{-- <div class="guest-create">
            Add new Guest
        </div> --}}
    </div>
</div>
@endforeach

@else
<p>No invitations here</p>
@endunless

{{ $invitations->links() }}

@endsection