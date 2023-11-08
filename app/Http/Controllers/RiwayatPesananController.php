<?php

namespace App\Http\Controllers;

use App\Models\DetailWisata;
use App\Models\transaksi;
use Illuminate\Http\Request;

class RiwayatPesananController extends Controller
{
    function index() {
        $transaksi = transaksi::with('User','detail_user')->where('id',auth()->user()->id)->get();
        return view('riwayat',compact('transaksi'));
    }

    function show($id) {
        $transaksi = transaksi::with('User','detail_user')->where('id',auth()->user()->id)->where('id_transaksi',$id)->first();
        $detail = DetailWisata::select('detail_transaksi.*','tiket.jenis_tiket','tiket.harga_tiket','destinasi.nama_des','destinasi.alamat')
                            ->join('tiket','tiket.id_tiket','detail_transaksi.id_tiket')
                            ->join('destinasi','destinasi.id_destinasi','detail_transaksi.id_destinasi')
                            ->where('detail_transaksi.id_transaksi',$transaksi->id_transaksi)->get();
        return view('riwayat-detail',[
            'data' => $transaksi,
            'detail' => $detail,
        ]);

    }

    function download() {
        $transaksi = transaksi::with('User','detail_user')->where('id',auth()->user()->id)->get();
        return view('riwayat-pdf',compact('transaksi'));
    }
}
