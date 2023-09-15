<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\detail_transaksi;
use App\Models\transaksi;
use App\Models\tiket;
use Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $detail_transaksi = detail_transaksi::with('destinasi', 'transaksi', 'tiket')->get();
        return view('form_order', compact('detail_transaksi'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
        ]);
        $tglpesan = strtotime($request->post('hari'));
        $tglpesan = date("l", $tglpesan);
        $tglpesan = strtolower($tglpesan);
        if ($tglpesan == "saturday" || $tglpesan == "sunday") {
            $tglpesan = 'Weekend';
        } else {
            $tglpesan = 'Weekday';
        }
        // echo $tiketanak;
        $tiket = tiket::with('destinasi')->where('id_destinasi', '=', $_REQUEST['id_destinasi'])
        ->where('jenis_hari', '=', $tglpesan)->get()->toArray();
        if (empty($tiket) ) {
            return redirect()->back()->with(['Log-error' => 'Data tidak ditemukan!']);
        }
        $i = 0;
        $totalbayar = array();
        $idtiketdewasa = array();
        $idtiketanak = array();

        foreach ($tiket as $data) {
            if ($data['jenis_tiket'] == 'Dewasa') {
                $idtiketdewasa =  $data['id_tiket'];
                $jumlahtiket = $_REQUEST['dewasa'];
                $hargatiketdws = $data['harga_tiket'];
                $totaltiketdewasa = $jumlahtiket * $hargatiketdws;
                $totalbayar[] = $totaltiketdewasa;
                if ($totaltiketdewasa != 0) {
                    $keranjangTiket[$i] = array(
                        'jumlahtiket' => $jumlahtiket,
                        'hargatiketdws' => $hargatiketdws,
                        'total' => $totaltiketdewasa,
                        'jenis' => 'Dewasa'
                    );
                }
            } elseif ($data['jenis_tiket'] == 'Anak-Anak') {
                $idtiketanak =  $data['id_tiket'];
                $jumlahtiket = $_REQUEST['anak'];
                $hargatiketanak = $data['harga_tiket'];
                $totaltiketanak = $jumlahtiket * $hargatiketanak;
                $totalbayar[] = $totaltiketanak;
                if ($totaltiketanak != 0) {
                    $keranjangTiket[$i] = array(
                        'jumlahtiket' => $jumlahtiket,
                        'hargatiketanak' => $hargatiketanak,
                        'total' => $totaltiketanak,
                        'jenis' => 'Anak'
                    );
                }
            }
            $i++;
        }
        $totalbayar = array_sum($totalbayar);

        // print_r($keranjangTiket);
        // echo array_sum($totalbayar);

        $cek = DB::table('transaksi')->get('id_transaksi')->last();
        if ($cek == NULL) {
            $urut = 1;
            $id_transaksi = 'TRX' . sprintf("%05s", $urut);
        } else {
            $urut = (int)substr($cek->id_transaksi, -5);
            $id_transaksi = 'TRX' . sprintf("%05s", ($urut + 1));
        }

        $tglnota = Carbon::now()->toDateString();
        DB::table('transaksi')->insert([
            'id_transaksi' => $id_transaksi,
            'tgl_transaksi' => $request->hari,
            'total_bayar' => $totalbayar,
            'status' => 'Belum Konfirmasi',
            'metode_bayar' => 'Tidak Ada',
            'id' => $request->id,
        ]);

        $cek = DB::table('detail_transaksi')->get('id_detailtransaksi')->last();
        if ($cek == NULL) {
            $id_detailtransaksi = 1;
        } else {
            $ambil = detail_transaksi::latest('id_detailtransaksi')->first();
            $urut = (int)substr($ambil->id_destinasi, -5);
            $id_detailtransaksi = $urut + 1;
        }

        if ($_REQUEST['dewasa'] != NULL) {
            DB::table('detail_transaksi')->insert([
                'jumlah_tiket' => $request->dewasa,
                'id_destinasi' => $request->id_destinasi,
                'id_transaksi' => $id_transaksi,
                'id_tiket' => $idtiketdewasa,
            ]);
        }

        if ($_REQUEST['anak'] != NULL) {
            DB::table('detail_transaksi')->insert([
                'jumlah_tiket' => $request->anak,
                'id_destinasi' => $request->id_destinasi,
                'id_transaksi' => $id_transaksi,
                'id_tiket' => $idtiketanak,
            ]);
        }
        return view('form_order', compact('tiket', 'id_transaksi', 'totalbayar', 'hargatiketdws', 'hargatiketanak', 'totaltiketanak', 'totaltiketdewasa', 'tglnota'));


        // return redirect()->route('form_bayar');
    }
}
