<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\destinasi;
use App\Models\feedback;
use Auth;

class FeedController extends Controller
{
    public function index()
    {
        $feedback = feedback::with('destinasi')->get();
        return view('backend/feedback.index', compact('feedback'));
    }

    public function destroy($id_feedback)
    {
        $feedback = feedback::find($id_feedback);
        feedback::where('id_feedback', $id_feedback)->delete();

        return redirect()->route('admin.feed')->with('error', 'Review Wisata Berhasil Dihapus!');
    }
}
