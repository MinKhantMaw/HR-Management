<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $authUser = Auth::user();
        return view('home', ['authUser' => $authUser]);
    }
}
