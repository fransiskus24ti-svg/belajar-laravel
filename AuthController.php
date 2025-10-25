<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/',
            ],
        ], [
            'password.min'   => 'Password minimal 3 karakter',
            'password.regex' => 'Password harus mengandung huruf kapital',
        ]);

        $pass = "Zian123";

        if ($request->username && $request->password === $pass) {
            return redirect('/auth')->with('success', 'Login berhasil!');
        } else {
            return redirect('/auth')->with('error', 'Username atau Password salah!');
        }
    }
}
