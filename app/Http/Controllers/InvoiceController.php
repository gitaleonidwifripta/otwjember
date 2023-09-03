<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\detail_transaksi;
use App\Models\transaksi;
use App\Models\tiket;
use App\Models\destinasi;

class InvoiceController extends Controller
{
    public function edit(Request $request)
    {
        // $detail_transaksi = detail_transaksi::with('destinasi', 'transaksi', 'tiket')
        //     ->where('id_transaksi', $id_transaksi)->first();
        dd($request->invoice);
        // return view('invoice', compact('detail_transaksi'));
    }

    public function show(Request $request)
    {

        $detail = DB::table('transaksi')->join('detail_transaksi', 'transaksi.id_transaksi', '=', 'detail_transaksi.id_transaksi')
            ->join('destinasi', 'destinasi.id_destinasi', '=', 'detail_transaksi.id_destinasi')
            ->join('tiket', 'tiket.id_tiket', '=', 'detail_transaksi.id_tiket')
            ->where('transaksi.id_transaksi', '=', $request->id)->get();
        // dd($detail);
        return view('invoice', compact('detail'));
    }
}