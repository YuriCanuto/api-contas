<?php

namespace App\Providers;

use App\Events\UsuarioRegistradoEvent;
use App\Listeners\EnviarEmailBoasVindasListener;
use App\Listeners\EnviarEmailVerificacaoListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UsuarioRegistradoEvent::class => [
            EnviarEmailBoasVindasListener::class,
            EnviarEmailVerificacaoListener::class
        ]
    ];

    public function boot()
    {
        parent::boot();
    }
}