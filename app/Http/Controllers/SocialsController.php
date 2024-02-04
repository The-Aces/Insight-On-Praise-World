<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialsController extends Controller
{
    public function index()
    {
        $userData = Auth::user();

        return view('socialmedia.index')->with(['userData' => $userData]);
    }

    
}
