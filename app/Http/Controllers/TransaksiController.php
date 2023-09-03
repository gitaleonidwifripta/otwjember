<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\transaksi;
use Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')->get();
        // return view('backend/transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $cek = DB::table('transaksi')->get('id_transaksi')->last();
        if ($cek == NULL) {
            $urut = 1;
            $id_transaksi = 'TRX' . sprintf("%05s", $urut);
        } else {
            $urut = (int)substr($cek->id_transaksi, -5);
            $id_transaksi = 'TRX' . sprintf("%05s", ($urut + 1));
        }
        $transaksi = DB::table('transaksi')->get();
        // return view('backend/transaksi.create', compact('id_transaksi', 'transaksi'));
    }

    public function store(Request $request)
    {
        DB::table('transaksi')->insert([
            'id_transaksi' => $request->id_transaksi,
            'tgl_transaksi' => $request->tgl_transaksi,
            'total_bayar' => $request->total_bayar,
            'metode_bayar' => $request->metode_bayar,
            'id_user' => $request->id_user,
        ]);

        // return redirect()->route('admin.transaksi')->with('success', 'transaksi Berhasil Ditambahkan!');
    }

    public function edit($id_transaksi)
    {
        $transaksi = DB::table('transaksi')->where('transaksi', $id_transaksi)->first();
        // return view('backend/transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id_transaksi)
    {
        $transaksi =  DB::table('transaksi')->where('id_transaksi', $id_transaksi)->first();

        DB::table('transaksi')->where('id_transaksi', $id_transaksi)->update([
            'id_transaksi' => $request->id_transaksi,
            'tgl_transaksi' => $request->tgl_transaksi,
            'total_bayar' => $request->total_bayar,
            'metode_bayar' => $request->metode_bayar,
            'id_user' => $request->id_user,
        ]);

        // return redirect()->route('admin.transaksi')->with('update', 'transaksi Berhasil Diupdate!');
    }

    public function destroy($id_transaksi)
    {
        $transaksi = transaksi::find($id_transaksi);
        transaksi::where('id_transaksi', $id_transaksi)->delete();
    }
}
