<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\detail_user;
use Auth;

class AdminController extends Controller
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
    public function profile()
    {
        // jika ada isi nya
        if (detail_user::exists()) {
            $id = Auth()->user()->id;
            $users = detail_user::with('User')
                ->where('id', $id)
                ->get();
        } else {
            $id = Auth()->user()->id;
            $users = DB::table('users')
                ->where('id', $id)
                ->get();
        }
        return view('backend.profile', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $id = Auth()->user()->id;
        $file = $request->file('foto_profil');
        $foto_profil = 'foto_profil'  . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/fotoprofil'), $foto_profil);

        DB::table('detail_user')->insert([
            'alamat_user' => $request->alamat_user,
            'jenis_klm' => $request->jenis_klm,
            'foto_profil' => $foto_profil,
            'id' => $request->id,

        ]);

        return redirect()->route('admin.profile')->with('update', 'Profile Berhasil Diupdate!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        return view('backend.ubahpass');
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
            return redirect('/edit_password')->with('error', 'Password Lama Salah!');
        }

        if ($request->confirmPassword != $request->password) {
            return redirect('/edit_password')->with('error', 'Konfirmasi Password Tidak Sama!');
        }

        DB::table('users')->where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.password')->with('update', 'Password Berhasil Diupdate!');
    }
}
