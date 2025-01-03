<?php

namespace App\Jobs;

use App\Mail\addGameMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class addGameMailJob implements ShouldQueue
{
    use Queueable;

    public $videogame;

    /**
     * Create a new job instance.
     */
    public function __construct($videogame){
        $this->videogame = $videogame;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to("admin@gmail.com")->send(new addGameMail($this->videogame));
    }
}
