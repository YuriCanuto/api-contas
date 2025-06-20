<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    /** @return void */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    /** @return bool */
    public function getIncrementing(): bool
    {
        return false;
    }

    /** @return string */
    public function getKeyType(): string
    {
        return 'string';
    }
}
