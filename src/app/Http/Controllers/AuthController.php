<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function register(Request $request){

    $validated = $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8'
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password'])
    ]);

    // Auth::login($user);

    return redirect()->route('login');
    }

    // login 

    public function login(Request $request){

        $credentials =$request->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials,$request->remember)){

            $request->session()->regenerate();

            $user = Auth::user();

        if($user->role === UserRole::ADMIN){
            return redirect()->route('admin.dashboard');
        }
            return redirect()->route('dashboard');
        }
        
        throw ValidationException::withMessages([
            'email' => 'Email or Password incorrect try again'
        ]);
    
    }

    // logout

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
