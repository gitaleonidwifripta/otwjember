<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\destinasi;
use Illuminate\Support\Facades\DB;
use App\Models\tiket;
use Auth;

class TiketController extends Controller
{
    // nampilkan form tiket 
    public function index()
    {
        $tiket = tiket::with('destinasi')->get();
        return view('backend/tiket.index', compact('tiket'));
    }
// nampilkan halaman tambah tiket
    public function create()
    {
        $cek = DB::table('tiket')->get('id_tiket')->last();
        if ($cek == NULL) {
            $id_tiket = 1;
        } else {
            $ambil = tiket::latest('id_tiket')->first();
            $urut = (int)substr($ambil->id_tiket, -5);
            $id_tiket = $urut + 1;
        }

        $tiket = tiket::with('destinasi')->get();
        $destinasi = destinasi::all();
        return view('backend/tiket.create', compact('id_tiket', 'tiket', 'destinasi'));
    }
// proses nambah tiket
    public function store(Request $request)
    {
        DB::table('tiket')->insert([
            'id_tiket' => $request->id_tiket,
            'id_destinasi' => $request->id_destinasi,
            'jenis_hari' => $request->jenis_hari,
            'jenis_tiket' => $request->jenis_tiket,
            'harga_tiket' => $request->harga_tiket,
        ]);

        return redirect()->route('admin.tiket')->with('success', 'Tiket Wisata Berhasil Ditambahkan!');
    }
// nampilkan form edit tiket
    public function edit($id_tiket)
    {
        $tiket = tiket::with('destinasi')->where('id_tiket', $id_tiket)->first();
        $destinasi = destinasi::all();
        return view('backend/tiket.edit', compact('tiket', 'destinasi'));
    }
// proses edit
    public function update(Request $request, $id_tiket)
    {
        $tiket =  DB::table('tiket')->where('id_tiket', $id_tiket)->first();

        DB::table('tiket')->where('id_tiket', $id_tiket)->update([
            'id_tiket' => $request->id_tiket,
            'id_tiket' => $request->id_tiket,
            'jenis_hari' => $request->jenis_hari,
            'jenis_tiket' => $request->jenis_tiket,
            'harga_tiket' => $request->harga_tiket,
        ]);

        return redirect()->route('admin.tiket')->with('update', 'Tiket Wisata Berhasil Diupdate!');
    }
// proses menghapus tiket
    public function destroy($id_tiket)
    {
        $tiket = tiket::find($id_tiket);
        tiket::where('id_tiket', $id_tiket)->delete();

        return redirect()->route('admin.tiket')->with('error', 'Tiket Wisata Berhasil Dihapus!');
    }
}
