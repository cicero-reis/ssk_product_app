<?php

namespace App\Providers;

use App\Events\ProductImageUploadedEvent;
use App\Listeners\ProductImageUploadedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ProductImageUploadedEvent::class => [
            ProductImageUploadedListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
