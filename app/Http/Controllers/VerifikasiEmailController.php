<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerifikasiEmailController extends Controller
{
    function email($id)  {
        $user = User::find($id);
        $user->status = '1';
        $user->update();
        return redirect()->route('login')->with(['Log-success' => 'Selamat! Akun anda telah di verifikasi.']);
    }
}
