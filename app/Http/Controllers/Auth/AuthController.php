<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            return redirect('dashboard')->with('success', 'Login successfull !');
        }
        return redirect()->back()->with('error', 'Incorrect Email or Password !');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ], [
            'firstname.required' => 'Firstname is required.',
            'lastname.required' => 'Lastname is required.',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is Already Registered.',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Confirm password is required',
            'password_confirmation.same' => 'Password and confirm password is not same',
        ]);

        if (User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])) {
            return redirect('login')->with('success', 'Registeration successfull !');
        }
        return redirect()->back()->with('error', config('constants.errorMessage'));
    }

    public function forgotPassword()
    {
        return view('auth.passwords.forgot');
    }

    public function recoverPassword()
    {
        return view('auth.passwords.recover');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('login')->with('success', 'logged out successfull');
    }
}
