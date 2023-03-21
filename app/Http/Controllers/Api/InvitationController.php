<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index(Request $request)
    {
        $invitation = $request->user();
        $invitation['guests'] = Invitation::find($invitation->id)->guests;
        return response($invitation, 200);
    }
}
