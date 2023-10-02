<?php

namespace App\Jobs;

use App\Mail\NewsUpdateMail;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendNewsUpdateEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $email;
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $destinasi = DB::table('destinasi')
            ->orderByDesc('id_destinasi')
            ->whereDate('created_at',Carbon::now())
            ->take(1)
            ->get();
        // Check if the collection is not empty
        if (!$destinasi->isEmpty()) {
            $destinasi->map(function ($item) {
                $item->gambar_des = DB::table('gambar_destinasi')->where('id_destinasi', $item->id_destinasi)->first()?->gambar_des;
                return $item;
            });
            Mail::to($this->email)->send(new NewsUpdateMail($destinasi));
        }
    }
}
