<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeatherController extends Controller
{
    public function index ()
    {
        $userData = Auth::user();

        return view('weather.index')->with(['userData' => $userData]);
    }

    
}
