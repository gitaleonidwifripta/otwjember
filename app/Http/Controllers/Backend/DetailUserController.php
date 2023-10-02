<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\detail_user;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailUserController extends Controller
{
    public function edit()
    {
        $detail = detail_user::count();
        if ($detail == 0) {
            $tambah = new detail_user;
            $tambah->alamat_user = 'isi alamat anda';
            $tambah->id = Auth::user()->id;
            $tambah->save();
        }
        $user = User::with('detail_user')->where('id',Auth::user()->id)->first();
        $detail_user = detail_user::with('user')->get();
        return view('edit_profile', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'alamat_user' => 'required'
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name  = $request->name;
        $user->nohp = $request->nohp;
        $user->update();
        $detail_user = detail_user::where('id',$id)->first();
        if ($detail_user != null) {
            $update = detail_user::where('id',$id)->first();
            $update->jenis_klm =  $request->jenis_klm;
            $update->alamat_user = $request->get('alamat_user');
            if ($request->hasFile('gambar_konten')) {
                $photos = $request->file('gambar_konten');
                $filename = 'foto_profil' . date('His') . '.' . $photos->getClientOriginalExtension();
                $path = public_path('upload/fotoprofil');
                if ($photos->move($path, $filename)) {
                    $update->foto_profil = $filename;
                }else{
                    return redirect()->back()->withError('Terjadi kesalahan.');
                }
            }
            $update->update();
        }else{
            $tambah = new detail_user;
            $tambah->alamat_user = $request->get('alamat_user');
            $tambah->id = $id;
            $tambah->jenis_klm =  $request->jenis_klm;
            if ($request->hasFile('gambar_konten')) {
                $photos = $request->file('gambar_konten');
                $filename = date('His') . '.' . $photos->getClientOriginalExtension();
                $path = public_path('upload/fotoprofil');
                if ($photos->move($path, $filename)) {
                    $tambah->foto_profil = $filename;
                }else{
                    return redirect()->back()->withError('Terjadi kesalahan.');
                }
            }
            $tambah->save();

        }
        return redirect()->back();
    }
}
