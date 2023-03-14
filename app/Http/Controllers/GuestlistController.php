<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class GuestlistController extends Controller
{
    public function index(Request $request)
    {
        $invitations = Invitation::latest()->paginate(4);
        foreach($invitations as $invitation) {
            $invitation['guests'] = Invitation::find($invitation->id)->guests;
        }
        return view('guestlist.index', ['invitations' => $invitations]);
    }
}
