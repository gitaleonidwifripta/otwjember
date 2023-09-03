<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\faq;
use Auth;

class FaqController extends Controller
{
    public function index()
    {
        $faq = DB::table('faq')->get();
        return view('backend/faq.index', compact('faq'));
    }

    public function create()
    {
        $cek = DB::table('faq')->get('id_faq')->last();
        if ($cek == NULL) {
            $id_faq = 1;
        } else {
            $ambil = faq::latest('id_faq')->first();
            $urut = (int)substr($ambil->id_faq, -3);
            $id_faq = $urut + 1;
        }

        $faq = DB::table('faq')->get();
        return view('backend/faq.create', compact('id_faq', 'faq'));
    }

    public function store(Request $request)
    {
        DB::table('faq')->insert([
            'id_faq' => $request->id_faq,
            'faq_pertanyaan' => $request->faq_pertanyaan,
            'faq_jawaban' => $request->faq_jawaban,
        ]);

        return redirect()->route('admin.faq')->with('success', 'FAQ Berhasil Ditambahkan!');
    }

    public function edit($id_faq)
    {
        $faq = DB::table('faq')->where('id_faq', $id_faq)->first();
        return view('backend/faq.edit', compact('faq'));
    }

    public function update(Request $request, $id_faq)
    {
        $faq =  DB::table('faq')->where('id_faq', $id_faq)->first();

        DB::table('faq')->where('id_faq', $id_faq)->update([
            'id_faq' => $request->id_faq,
            'faq_pertanyaan' => $request->faq_pertanyaan,
            'faq_jawaban' => $request->faq_jawaban,
        ]);

        return redirect()->route('admin.faq')->with('update', 'FAQ Berhasil Diupdate!');
    }

    public function destroy($id_faq)
    {
        $faq = faq::find($id_faq);
        faq::where('id_faq', $id_faq)->delete();

        return redirect()->route('admin.faq')->with('error', 'FAQ Berhasil Dihapus!');
    }
}
