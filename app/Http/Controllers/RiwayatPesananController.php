<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class RiwayatPesananController extends Controller
{
    function index() {
        $transaksi = transaksi::with('User','detail_user')->where('id',auth()->user()->id)->get();
        return view('riwayat',compact('transaksi'));
    }
}
