<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\detail_user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailUserController extends Controller
{
    public function edit()
    {
        $user = Auth()->user();
        $detail_user = detail_user::with('user')->get();
        return view('edit_profile', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = DB::table('users')->where('id', $id)
            ->update([
                'name' => $request->name,
                'nohp' => $request->nohp,
            ]);

        return redirect()->back();
    }
}
