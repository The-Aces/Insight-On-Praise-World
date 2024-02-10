<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        try {

            $request->validate([ 
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'phone' => ['required', 'integer'],
                'country' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'], 
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' =>  strtolower($request->email),
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);

        } catch (\Throwable $th) {

            // $status = 500;
            // $resData = [ 'status' => $status, 'data' => [], 'message' => $th->getMessage()];

            $th->getMessage();
            
            throw $th;
        }


    }


    // public function returnJSON($data, $status)
    // {

    //     return response($data, $status)->header('Content-Type', 'application/json');
    // }

}
