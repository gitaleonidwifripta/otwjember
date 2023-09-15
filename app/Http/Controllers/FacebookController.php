<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacebookController extends Controller
{
    public function index()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $password = 'password';
        $findUser = User::where('email', $user->email)->first();
        if ($findUser) {
            $loginType = filter_var($user->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';

            $login = [
                $loginType => $user->email,
                'password' => $password
            ];

            if (auth()->attempt($login)) {
                if (Auth::user()->role == 'admin') {
                    return redirect()->route('dashboard');
                } elseif (Auth::user()->role == 'user') {
                    return redirect()->route('app');
                } elseif (Auth::user()->role == 'mitra') {
                    return redirect()->route('dash.des');
                } else {
                    return redirect()->route('login');
                }
            } else {
                return redirect()->route('login')->with(['Log-error' => 'Email/Password Yang Anda Masukkan Salah!']);
            }
            return redirect()->route('beranda');
        } else {

            User::create([
                'name' => $user->name,
                'email' => $user->email,
                'nohp' => '0849124',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);
            return redirect("login")->with(['Log-success' => 'Selamat! Akun anda telah terdaftar']);
        }
    }
}
