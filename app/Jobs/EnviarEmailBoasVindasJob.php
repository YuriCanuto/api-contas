<?php

namespace App\Jobs;

use App\Mail\BoasVindasEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EnviarEmailBoasVindasJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private User $user
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)
            ->send(new BoasVindasEmail($this->user));
    }

    /**
     * Handle job failure.
     */
    public function failed(\Exception $exception)
    {
        //
    }
}
