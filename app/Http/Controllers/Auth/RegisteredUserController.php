<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        // if ($user->hasRole($request->role == 'Admin')) {
        //     return redirect()->route('Admin');
        // } else {
        //     return redirect()->route('User');
        // }


        // if (Auth::check()) {
        //     $user = Auth::user();
        //     } 

        event(new Registered($user));

        Auth::login($user);

        
        if ($user->hasRole($request->role) == "Admin") {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole($request->role) == "User") {
            return redirect()->route('dashboard');
        }
        
        return redirect(route('dashboard', absolute: false));
    }
    
    

     
 
}
