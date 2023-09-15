<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewsUpdateEmail;
use App\Models\newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    function post(Request $request)  {
        // return $request;
        $request->validate([
            'subscribe' => 'required|email'
        ]);
        $current = newsletter::where('email',$request->subscribe)->first();
        if ($current != null) {
            return redirect()->route('app')->with(['Log-error' => 'Email anda sudah berlangganan!']);
        }

        $newsletter = new newsletter;
        $newsletter->email = $request->subscribe;
        $newsletter->save();
        return redirect()->route('app')->with(['Log-success' => 'Dapatkan notifikasi destinasi terbaru di email anda !']);
    }
}
