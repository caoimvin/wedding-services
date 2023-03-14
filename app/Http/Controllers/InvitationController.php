<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function create()
    {
        return view('invitations.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'recipient' => 'required',
            'access_code' => ['required', 'unique:invitations']
        ]);

        Invitation::create($formFields);

        return redirect('/guestlist')->with('message', 'Invitation created');
    }

    public function edit(Invitation $invitation)
    {
        return view('invitations.edit', ['invitation' => $invitation]);
    }

    public function update(Request $request, Invitation $invitation)
    {
        $formFields = $request->validate([
            'recipient' => 'required'
        ]);

        $invitation->update($formFields);

        return redirect('/guestlist')->with('message', 'Invitation updated');
    }

    public function destroy(Invitation $invitation)
    {
        $invitation->delete();
        return redirect('/guestlist')->with('message', 'Invitation deleted');
    }
}
