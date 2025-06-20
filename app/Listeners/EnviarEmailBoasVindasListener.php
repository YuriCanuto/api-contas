<?php

namespace App\Listeners;

use App\Events\UsuarioRegistradoEvent;
use App\Jobs\EnviarEmailBoasVindasJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnviarEmailBoasVindasListener
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
        EnviarEmailBoasVindasJob::dispatch($event->user);
    }
}
