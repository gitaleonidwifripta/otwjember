<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class MitraController extends Controller
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
    // public function profile()
    // {
    //     $id = Auth()->user()->id;
    //     $users = DB::table('users')
    //         ->where('id', $id)
    //         ->get();

    //     return view('backend.profile', compact('users'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function updateProfile(Request $request)
    // {
    //     $id = Auth()->user()->id;

    //     DB::table('users')->where('id', $id)->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //     ]);

    //     return redirect()->route('admin.profile')->with('update', 'Profile Berhasil Diupdate!');
    // }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        return view('mitra.ubahpass');
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
            return redirect('/edit_pass')->with('error', 'Password Lama Salah!');
        }

        if ($request->confirmPassword != $request->password) {
            return redirect('/edit_pass')->with('error', 'Konfirmasi Password Tidak Sama!');
        }

        DB::table('users')->where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('mitra.password')->with('update', 'Password Berhasil Diupdate!');
    }
}
