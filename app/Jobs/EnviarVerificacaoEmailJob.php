<?php

namespace App\Jobs;

use App\Mail\VerificacaoEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EnviarVerificacaoEmailJob implements ShouldQueue
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
            ->send(new VerificacaoEmail($this->user));
    }

    /**
     * Handle job failure.
     */
    public function failed(\Exception $exception)
    {
        Log::error('Verification email failed for user: ' . $this->user->email, [
            'error' => $exception->getMessage()
        ]);

        Mail::raw("Email verification failed for {$this->user->email}: {$exception->getMessage()}", function ($message) {
            $message->to('admin@example.com')
                    ->subject('Email Verification Job Failed');
        });
    }
}
