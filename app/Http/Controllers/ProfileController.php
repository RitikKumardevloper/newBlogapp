<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the authenticated user’s profile.
     */
    public function show()
    {
        return view('profile');
    }
}

