<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\detail_transaksi;
use App\Models\DetailWisata;
use App\Models\transaksi;
use Auth;

class DetailtransController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'mitra') {
            $detail_transaksi = DetailWisata::select('detail_transaksi.*','tiket.jenis_tiket','tiket.harga_tiket','destinasi.nama_des','destinasi.id as id_user','destinasi.alamat','transaksi.*')
                            ->join('tiket','tiket.id_tiket','detail_transaksi.id_tiket')
                            ->join('transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                            ->where('destinasi.id',auth()->user()->id)
                            ->join('destinasi','destinasi.id_destinasi','detail_transaksi.id_destinasi')
                            ->orderByDesc('detail_transaksi.id_detailtransaksi')
                            ->get();

        }else{
            $detail_transaksi = DetailWisata::select('detail_transaksi.*','tiket.jenis_tiket','tiket.harga_tiket','destinasi.nama_des','destinasi.id as id_user','destinasi.alamat','transaksi.*')
            ->join('tiket','tiket.id_tiket','detail_transaksi.id_tiket')
            ->join('transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
            ->join('destinasi','destinasi.id_destinasi','detail_transaksi.id_destinasi')
            ->get();

        }
        return view('backend/transaksi.index', compact('detail_transaksi'));
    }

    public function destroy($id_detailtransaksi)
    {
        $detail_transaksi = detail_transaksi::where('id_transaksi',$id_detailtransaksi)->delete();
        transaksi::where('id_transaksi',$id_detailtransaksi)->delete();

        return redirect()->route('admin.trans')->with('error', 'Transaksi Berhasil Dihapus!');
    }
}
