<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\kategori;
use Auth;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = DB::table('users')->get();
        return view('backend/pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        $cek = DB::table('users')->get('id')->last();
        if ($cek == NULL) {
            $id = 1;
        } else {
            $ambil = User::latest('id')->first();
            $urut = (int)substr($ambil->id, -3);
            $id = $urut + 1;
        }

        $pengguna = DB::table('users')->get();
        return view('backend/pengguna.create', compact('id', 'pengguna'));
    }

    public function store(Request $request)
    {
        DB::table('users')->insert([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.peng')->with('success', 'Pengguna Baru Berhasil Ditambahkan!');
    }
}
