<?php

namespace App\Console\Commands;

use App\Jobs\SendNewsUpdateEmail;
use App\Mail\NewsUpdateMail;
use App\Models\newsletter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendNewsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:newsupdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send latest news update to subscribers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $newsletter = newsletter::orderByDesc('id_news')->get();
        foreach ($newsletter as $item) {
            $destinasi = DB::table('destinasi')
                ->orderByDesc('id_destinasi')
                ->take(3)
                ->get();

            $destinasi->map(function ($item) {
                $item->gambar_des = DB::table('gambar_destinasi')->where('id_destinasi', $item->id_destinasi)->first()?->gambar_des;
                return $item;
            });
            Mail::to($item->email)->send(new NewsUpdateMail($destinasi));
        }
    }
}
