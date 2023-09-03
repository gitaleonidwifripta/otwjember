<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\detail_transaksi;
use App\Models\transaksi;
use Auth;

class DetailtransController extends Controller
{
    public function index()
    {
        $detail_transaksi = detail_transaksi::with('transaksi')->get();
        return view('backend/transaksi.index', compact('detail_transaksi'));
    }

    public function destroy($id_detailtransaksi)
    {
        $detail_transaksi = detail_transaksi::find($id_detailtransaksi);
        detail_transaksi::where('id_detailtransaksi', $id_detailtransaksi)->delete();

        return redirect()->route('admin.trans')->with('error', 'Transaksi Berhasil Dihapus!');
    }
}
