<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function authorization(Request $request) {
        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required',
        ], [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->role == 'admin') {
                return redirect()->intended('/');
            } else {
                $dosen_id = Dosen::where('user_id', Auth::user()->id)->first()->id;
                return redirect()->route('dosen.dashboard', ['dosen_id' => $dosen_id])->with('success', 'Login successful!');
            }
        }

        return back()->withErrors([
            'username' => 'Username or password is incorrect. Please try again!',
        ]);
    }

    public function register() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'jenis_kelamin' => 'required',
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Name must not exceed 255 characters',
            'username.required' => 'Username is required',
            'username.unique' => 'Username already exists',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.confirmed' => 'Passwords do not match',
            'jenis_kelamin.required' => 'Jenis Kelamin is required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'dosen',
        ]);

        Dosen::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'user_id' => $user->id,
        ]);

        return redirect()->route('auth.login')->with('success', 'Registration successful! You can now login.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
