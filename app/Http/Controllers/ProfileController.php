<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $authUser = Auth::user();
        return view('profile.profile', ['authUser' => $authUser]);
    }
}
