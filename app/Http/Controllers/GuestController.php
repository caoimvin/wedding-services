<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        return view('guests.index', [
            'guests' => Guest::latest()->filter(
                request(['invitation', 'name'])
            )->paginate(6)
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'invitation_id' => 'required'
        ]);

        Guest::create($formFields);

        return redirect('/guests')->with('message', 'Guest created');
    }
}
