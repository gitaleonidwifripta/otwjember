<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\destinasi;
use Illuminate\Support\Facades\DB;
use App\Models\gambar_destinasi;
use Auth;

class GambarController extends Controller
{
    public function index()
    {
        $gambar = gambar_destinasi::with('destinasi')->get();
        return view('mitra/gambar.index', compact('gambar'));
    }

    public function create()
    {
        $cek = DB::table('gambar_destinasi')->get('id_gambar_des')->last();
        if ($cek == NULL) {
            $id_gambar_des = 1;
        } else {
            $ambil = gambar_destinasi::latest('id_gambar_des')->first();
            $urut = (int)substr($ambil->id_gambar_des, -3);
            $id_gambar_des = $urut + 1;
        }

        $gambar = gambar_destinasi::with('destinasi')->get();
        $destinasi = destinasi::all();
        return view('mitra/gambar.create', compact('id_gambar_des', 'gambar', 'destinasi'));
    }

    public function store(Request $request)
    {
        $file = $request->file('gambar_des');
        $gambar_des = 'gambar_des_'  . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/'), $gambar_des);

        DB::table('gambar_destinasi')->insert([
            'id_gambar_des' => $request->id_gambar_des,
            'id_destinasi' => $request->id_destinasi,
            'gambar_des' => $gambar_des,
        ]);

        return redirect()->route('mitra.gambar')->with('success', 'File Berhasil Ditambahkan!');
    }

    public function edit($id_gambar_des)
    {
        $gambar = gambar_destinasi::with('destinasi')->where('id_gambar_des', $id_gambar_des)->first();
        $destinasi = destinasi::all();
        return view('mitra/gambar.edit', compact('gambar', 'destinasi'));
    }

    public function update(Request $request, $id_gambar_des)
    {
        $destinasi =  DB::table('gambar_des')->where('id_gambar_des', $id_gambar_des)->first();

        $oldImage = $request->oldImage;
        $file = $request->file('gambar_des');
        if (!empty($file)) {
            $gambar_des = 'gambar_des'  . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/'), $gambar_des);
            unlink("upload/" . $oldImage);
        } else {
            $gambar_des = $oldImage;
        }

        DB::table('gambar_des')->where('id_gambar_des', $id_gambar_des)->update([
            'id_gambar_des' => $request->id_gambar_des,
            'id_destinasi' => $request->id_destinasi,
            'gambar_des' => $gambar_des,
        ]);

        return redirect()->route('mitra.gambar')->with('update', 'File Berhasil Diupdate!');
    }

    public function destroy($id_gambar_des)
    {
        $gambar = gambar_destinasi::find($id_gambar_des);
        $gambar_des = $gambar->gambar_des;
        gambar_destinasi::where('id_gambar_des', $id_gambar_des)->delete();
        unlink("upload/" . $gambar_des);

        return redirect()->route('mitra.gambar')->with('error', 'File Berhasil Dihapus!');
    }
}
