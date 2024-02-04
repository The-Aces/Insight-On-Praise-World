<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendersController extends Controller
{
    public function index ()
    {
        $userData = Auth::user();

        return view('calender.index')->with(['userData' => $userData]);
    }
}
