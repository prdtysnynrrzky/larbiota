<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'name Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infoLogin = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('');
            }
        } else {
            return redirect()->back()->withErrors('Username dan Password yang dimasukan tidak sesuai');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}