<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\gambar_destinasi;
use App\Models\destinasi;
use App\Models\tiket;

class DetailWisataController extends Controller
{
    public function index(Request $request)
    {
        $gambar_destinasi = gambar_destinasi::with('destinasi')->get();
        $destinasi = destinasi::with('kategori')->get();
        return view('detail_wisata', compact('gambar_destinasi', 'destinasi'));
    }

    public function add_process(Request $gambar_destinasi)
    {
        DB::table('gambar_destinasi')->insert([
            'id_gambar_des' => $gambar_destinasi->id_gambar_des,
            'id_destinasi' => $gambar_destinasi->id_destinasi,
            'gambar_des' => $gambar_destinasi->gambar_des,
            'created_at' => $gambar_destinasi->created_at,
            'updated_at' => $gambar_destinasi->updated_at,
        ]);
        return redirect()->action('appController@show');
    }

    public function gambar_destinasi($id_gambar_des)
    {
        // $berita = DB::table('tb_berita')->where('id_berita', $id_berita)->first();
        // return view('artikels', compact('berita'));
        $gambar_destinasi = gambar_destinasi::find($id_gambar_des);
        return view('gambar_destinasi', compact('gambar_destinasi'));
    }

    public function store(Request $request)
    {
        $jam = $request->jam;
        $hari = $request->hari;

        $gambar_destinasi = DB::table('gambar_destinasi')->where('id_destinasi', '=', $_REQUEST['destinasi'])->get();
        $destinasi = DB::table('destinasi')->where('id_destinasi', '=', $_REQUEST['destinasi'])->get();
        $data = compact('gambar_destinasi', 'destinasi', 'jam', 'hari');

        return view('detail_wisata', $data);
    }
}
