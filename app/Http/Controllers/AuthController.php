<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //

    // auth()
    // Request => request()
    // Session => session()
    function RegisterForm()
    {
        return view('users.auth.register');
    }
    function LoginForm()
    {
        return view('users.auth.login');
    }

    function Register(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'image' => 'nullable|file|mimes:png,jpg'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('usersProfiles', $imageName);
            $validData['image'] = $imageName;
        }


        $user = User::create($validData);

        //   Auth::check(); // true
        //   Auth::user();
        //   Auth::id();

        Auth::login($user);
        return redirect('/profile');

        // return redirect('/login');


    }
    function Login(Request $request)
    {
        $validData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'remember_me' => 'nullable|boolean'
        ]);

        $attempt = Auth::attempt([
            'email' => $validData['email'],
            'password' => $validData['password'], //1236
        ], $request->input('remember_me', 0));

        if ($attempt) {
            $request->session()->regenerate();
            return redirect('/profile');
        } else {
            return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');
        }
    }

    function Logout(Request $request)
    {
        Auth::logout();
        // $request->user(); // null
        session()->flush(); // destroy session
        // Session::flush();
        return redirect('/login');
    }

    function Profile()
    {
        $user = Auth::user();
        return view('users.auth.profile', get_defined_vars());
    }
}
