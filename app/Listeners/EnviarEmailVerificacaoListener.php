<?php

namespace App\Listeners;

use App\Events\UsuarioRegistradoEvent;
use App\Jobs\EnviarVerificacaoEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnviarEmailVerificacaoListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UsuarioRegistradoEvent $event): void
    {
        EnviarVerificacaoEmailJob::dispatch($event->user);
    }
}
