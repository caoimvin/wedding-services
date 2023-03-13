<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index()
    {
        $invitations = Invitation::latest()->filter(
            request(['recipient'])
        )->paginate(4);
        foreach($invitations as $invitation) {
            $invitation['guests'] = Invitation::find($invitation->id)->guests;
        }
        return view('invitations.index', ['invitations' => $invitations]);
    }
}
