<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Invitation;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function create(Request $request)
    {
        $invitationId = $request->query('invitation');
        $invitation = Invitation::find($invitationId);
        return view('guests.create', ['invitation_id' => $invitation->id]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'invitation_id' => 'required'
        ]);

        Guest::create($formFields);

        return redirect('/guestlist')->with('message', 'Guest created');
    }

    public function edit(Guest $guest)
    {
        return view('guests.edit', ['guest' => $guest]);
    }

    public function update(Request $request, Guest $guest)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'invitation_id' => 'required'
        ]);

        $guest->update($formFields);

        return redirect('/guests')->with('message', 'Guest updated');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return redirect('/guestlist')->with('message', 'Guest deleted');
    }
}
