<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\gambar_destinasi;
use App\Models\destinasi;

class BookingController extends Controller
{
    public function booking()
    {
        $destinasi = DB::table('destinasi')
            ->get();

        $destinasi->map(function ($item) {
            $item->gambar_des = DB::table('gambar_destinasi')->where('id_destinasi', $item->id_destinasi)->first()?->gambar_des;
            return $item;
        });

        $kategori = DB::table('kategori')->get();
        return view('booking', compact('destinasi', 'kategori'));
    }

    public function add_process(Request $destinasi)
    {
        DB::table('destinasi')->insert([
            'id_destinasi' => $destinasi->id_destinasi,
            'nama_des' => $destinasi->nama_des,
            'alamat' => $destinasi->alamat,
            'status_des' => $destinasi->status_des,
            'deskripsi' => $destinasi->deskripsi,
            'id_kategori' => $destinasi->id_kategori,
        ]);
        return redirect()->action('AppController@show');
    }

    public function destinasis($id_destinasi)
    {
        // $berita = DB::table('tb_berita')->where('id_berita', $id_berita)->first();
        // return view('artikels', compact('berita'));
        $destinasi = destinasi::find($id_destinasi);
        return view('destinasis', compact('destinasi'));
    }

    public function store(Request $kategori)
    {
        DB::table('kategori')->insert([
            'id_kategori' => $kategori->id_kategori,
            'kategori' => $kategori->kategori,
        ]);
        return redirect()->action('AppController@show');
    }

    public function add_proces(Request $gambar_destinasi)
    {
        DB::table('gambar_destinasi')->insert([
            'id_gambar_des' => $gambar_destinasi->id_gambar_des,
            'id_destinasi' => $gambar_destinasi->id_destinasi,
            'gambar_des' => $gambar_destinasi->gambar_des,
            'created_at' => $gambar_destinasi->created_at,
            'updated_at' => $gambar_destinasi->updated_at,
        ]);
        return redirect()->action('AppController@show');
    }

    public function gambar_destinasis($id_gambar_des)
    {
        // $berita = DB::table('tb_berita')->where('id_berita', $id_berita)->first();
        // return view('artikels', compact('berita'));
        $gambar_destinasi = gambar_destinasi::find($id_gambar_des);
        return view('gambar_destinasis', compact('gambar_destinasi'));
    }
}
