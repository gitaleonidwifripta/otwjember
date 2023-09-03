<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\kategori;
use Auth;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return view('backend/kategori.index', compact('kategori'));
    }

    public function create()
    {
        $cek = DB::table('kategori')->get('id_kategori')->last();
        if ($cek == NULL) {
            $id_kategori = 1;
        } else {
            $ambil = kategori::latest('id_kategori')->first();
            $urut = (int)substr($ambil->id_kategori, -3);
            $id_kategori = $urut + 1;
        }

        $kategori = DB::table('kategori')->get();
        return view('backend/kategori.create', compact('id_kategori', 'kategori'));
    }

    public function store(Request $request)
    {
        DB::table('kategori')->insert([
            'id_kategori' => $request->id_kategori,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.kate')->with('success', 'Kategori Berhasil Ditambahkan!');
    }

    public function edit($id_kategori)
    {
        $kategori = DB::table('kategori')->where('id_kategori', $id_kategori)->first();
        return view('backend/kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id_kategori)
    {
        $kategori =  DB::table('kategori')->where('id_kategori', $id_kategori)->first();

        DB::table('kategori')->where('id_kategori', $id_kategori)->update([
            'id_kategori' => $request->id_kategori,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.kate')->with('update', 'Kategori Berhasil Diupdate!');
    }

    public function destroy($id_kategori)
    {
        $kategori = kategori::find($id_kategori);
        kategori::where('id_kategori', $id_kategori)->delete();

        return redirect()->route('admin.kate')->with('error', 'Kategori Berhasil Dihapus!');
    }
}
