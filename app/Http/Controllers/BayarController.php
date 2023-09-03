<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\detail_transaksi;
use App\Models\transaksi;
use App\Models\User;
use App\Models\tiket;

class BayarController extends Controller
{

    public function update(Request $request, $id_transaksi)
    {
        DB::table('transaksi')->where('id_transaksi', $id_transaksi)->update([
            'status' => 'Belum Bayar',
            'metode_bayar' => $request->metode_bayar,
            'id' => $request->id,
        ]);
        // echo $id;
        return redirect()->route('show-invoice', 'id=' . $id_transaksi);
    }
}