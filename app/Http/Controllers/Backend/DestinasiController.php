<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\destinasi;
use App\Models\kategori;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasi = destinasi::with('kategori', 'User')->get();
        return view('backend/destinasi.index', compact('destinasi'));
    }

    public function create()
    {
        $cek = DB::table('destinasi')->get('id_destinasi')->last();
        if ($cek == NULL) {
            $id_destinasi = 1;
        } else {
            $ambil = destinasi::latest('id_destinasi')->first();
            $urut = (int)substr($ambil->id_destinasi, -3);
            $id_destinasi = $urut + 1;
        }

        $destinasi = destinasi::with('kategori', 'User')->get();
        $kategori = kategori::all();
        $user = User::all();
        return view('backend/destinasi.create', compact('id_destinasi', 'destinasi', 'kategori', 'user'));
    }

    public function store(Request $request)
    {
        DB::table('destinasi')->insert([
            'id_destinasi' => $request->id_destinasi,
            'nama_des' => $request->nama_des,
            'alamat' => $request->alamat,
            'status_des' => $request->status_des,
            'deskripsi' => $request->deskripsi,
            'id_kategori' => $request->id_kategori,
            'id' => $request->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.des')->with('success', 'Destinasi Wisata Berhasil Ditambahkan!');
    }

    public function edit($id_destinasi)
    {
        $destinasi = destinasi::with('kategori', 'User')->where('id_destinasi', $id_destinasi)->first();
        $kategori = kategori::all();
        $user = User::all();
        return view('backend/destinasi.edit', compact('destinasi', 'kategori', 'user'));
    }

    public function update(Request $request, $id_destinasi)
    {
        $destinasi =  DB::table('destinasi')->where('id_destinasi', $id_destinasi)->first();

        DB::table('destinasi')->where('id_destinasi', $id_destinasi)->update([
            'id_destinasi' => $request->id_destinasi,
            'nama_des' => $request->nama_des,
            'alamat' => $request->alamat,
            'status_des' => $request->status_des,
            'deskripsi' => $request->deskripsi,
            'id_kategori' => $request->id_kategori,
            'id' => $request->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.des')->with('update', 'Destinasi Wisata Berhasil Diupdate!');
    }

    public function destroy($id_destinasi)
    {
        $destinasi = destinasi::find($id_destinasi);
        destinasi::where('id_destinasi', $id_destinasi)->delete();

        return redirect()->route('admin.des')->with('error', 'Destinasi Wisata Berhasil Dihapus!');
    }
}
