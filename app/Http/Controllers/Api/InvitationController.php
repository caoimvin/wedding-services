<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function getData(Request $request)
    {
        $request->validate([
            'access_code' => 'required'
        ]);
        $invitation = Invitation::where('access_code', '=', $request['access_code'])->first();
        $invitation['guests'] = Invitation::find($invitation->id)->guests;
        return $invitation;
    }
}
