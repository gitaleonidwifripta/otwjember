<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class PassController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        return view('ubahpass');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $id = Auth()->user()->id;
        $users = User::find($id);
        $hashedPassword = $users->password;

        $hashedPassword = $users->password;
        if (!Hash::check($request->oldPassword, $hashedPassword)) {
            return redirect('/edit_katasandi')->with('error', 'Password Lama Salah!');
        }

        if ($request->confirmPassword != $request->password) {
            return redirect('/edit_katasandi')->with('error', 'Konfirmasi Password Tidak Sama!');
        }

        DB::table('users')->where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.password')->with('update', 'Password Berhasil Diupdate!');
    }
}
